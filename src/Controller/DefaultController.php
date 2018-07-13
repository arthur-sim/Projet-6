<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
   /**
    * @Route("/", name="default_homepage")
    * @return type
    */
   public function homepageAction(){
       return $this->render('default/homepage.html.twig');
   }
   
   /**
     * @Route("/admin", name="admin")
     * @return type
     */
    public function admin()
    {
        return $this->render('admin/index.html.twig');
    }
}