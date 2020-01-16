<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Admin1Controller extends AbstractController
{
    /**
     * @Route("/admin1", name="admin1")
     */
    public function index()
    {
        return $this->render('admin1/index.html.twig', [
            'controller_name' => 'Admin1Controller',
        ]);
    }
}
