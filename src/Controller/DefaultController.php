<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'AUTH0_DOMAIN' => getenv('AUTH0_DOMAIN'),
            'AUTH0_CLIENT_ID' => getenv('AUTH0_CLIENT_ID')
        ]);
    }
}
