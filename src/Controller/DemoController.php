<?php

namespace Danielm\DemoBundle\Controller;

use Danielm\DemoBundle\Contract\DemoServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/hola', name: 'index_demo')]
    public function index(DemoServiceInterface $service): JsonResponse
    {
        return $this->json([
            'message' => 'Index action from our DemoController Bundle!',
            'result' => $service->calc(12, 13),
        ]);
    }
}