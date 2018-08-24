<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;    

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;

    /**
    * @ORM\ManyToOne(targetEntity="User")
    * @ORM\JoinColumn(nullable = false)
    */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="Post")
     */
    protected $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="Video", mappedBy="Post")
     */
    protected $videos;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\NotBlank(message="Please, upload image as a jpg file.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image1;
    
    public function __construct() {
        $this->create_at = new \Datetime();
        /*$this->user = ;*/
    }
    
    public function getImage1()
    {
        return $this->image1;
    }

    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }
    
    public function getVideos() {
        
    }
    
    public function getComments() {
        
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image2;
    
    public function getImage2()
    {
        return $this->image2;
    }

    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }
    
    /**
     * @ORM\Column(type="string",nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image3;
    
    public function getImage3()
    {
        return $this->image3;
    }

    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }
    
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image4;
    
    public function getImage4()
    {
        return $this->image4;
    }

    public function setImage4($image4)
    {
        $this->image = $image4;

        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
