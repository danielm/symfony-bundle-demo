<?php

namespace Danielm\DemoBundle\Controller;

use Danielm\DemoBundle\Configuration;
use Danielm\DemoBundle\Contract\DemoServiceInterface;
use Danielm\DemoBundle\Event\UnnecessaryEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /*public function __construct(
        protected Configuration $configuration
    ) { }*/

    #[Route('/{a}/{b}', name: 'demo_index', requirements: ['a' => '\d+', 'b' => '\d+'])]
    public function index(
        int $a,
        int $b,
        DemoServiceInterface $service,
        Configuration $configuration,
    ): JsonResponse {
        return $this->json([
            'message' => 'Index action from our DemoController Bundle!',
            'result' => $service->calc($a, $b),
            'config' => [
                '#1' => $configuration->getEnvValue(),
            ],
        ]);
    }

    #[Route('/view', name: 'demo_view')]
    public function view(): Response
    {
        return $this->render('@DanielmDemo/Demo/view.html.twig');
    }

    #[Route('/dispatch', name: 'demo_dispatch')]
    public function dispatch(EventDispatcherInterface $dispatcher): JsonResponse
    {
        $dispatcher->dispatch(new UnnecessaryEvent());

        return $this->json([
            'message' => 'Event dispatched!',
        ]);
    }
}
