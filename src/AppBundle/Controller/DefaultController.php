<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return $this->respond([]);
    }

    public function respond($data = null)
    {
        $response = new JsonResponse();
        $response->setData($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
