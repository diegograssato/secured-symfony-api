<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 03/10/2018
 * Time: 4:14 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecuredController extends Controller
{
    /**
     * @Route("/api/public", name="public")
     * @return JsonResponse
     */
    public function publicAction()
    {
        return new JsonResponse([
           'message' => "Hello from a public endpoint! You don't need to be authenticated to see this."
        ]);
    }

    /**
     * @Route("/api/private", name="private")
     */
    public function privateAction()
    {
        return new JsonResponse(array(
            'message' => "Hello from a private endpoint! You need to be authenticated to see this."
        ));
    }
    /**
     * @Route("/api/private-scoped", name="privatescoped")
     */
    public function privateScopedAction()
    {
        return new JsonResponse(array(
            'message' => "Hello from a private endpoint! You need to be authenticated and have a scope of read:messages to see this."
        ));
    }
}