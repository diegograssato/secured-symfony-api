<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/home/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'AUTH0_DOMAIN' => getenv('AUTH0_DOMAIN'),
            'AUTH0_CLIENT_ID' => getenv('AUTH0_CLIENT_ID')
        ]);
    }


    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function home()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'AUTH0_DOMAIN' => getenv('AUTH0_DOMAIN'),
            'AUTH0_CLIENT_ID' => getenv('AUTH0_CLIENT_ID')
        ]);
    }
}
