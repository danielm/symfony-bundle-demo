<?php

namespace Danielm\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/', name: 'index_demo')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Index action from our DemoController Bundle!',
        ]);
    }
}