<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
