<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use App\Entity\Post;
use App\Service\FileUploader;

class ImageUploadListener
{
    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Post) {
            return;
        }

        $file = $entity->getImage1();

        // only upload new files
        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file);
            $entity->setImage1($fileName);
        } elseif ($file instanceof File) {
            // prevents the full file path being saved on updates
            // as the path is set on the postLoad listener
            $entity->setImage1($file->getFilename());
        }
    }
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getImage1();

        if (!$entity instanceof Post) {
            return;
        }

        if ($fileName = $entity->getImage1()) {
            $entity->setImage1(new File($this->uploader->getTargetDirectory().'/'.$fileName));
        }
    }
}