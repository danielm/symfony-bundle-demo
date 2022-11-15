<?php

namespace Danielm\DemoBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class DemoControllerTest extends WebTestCase
{
    protected KernelBrowser $client;
    protected RouterInterface $router;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->router = $this->getContainer()->get(RouterInterface::class);
    }

    protected static function getKernelClass(): string
    {
        return \Danielm\DemoBundle\Tests\Kernel::class;
    }

    public function testIndexAction(): void
    {
        $url = $this->router->generate('demo_index', ['a' => 6, 'b' => '5'], UrlGeneratorInterface::ABSOLUTE_PATH);

        $crawler = $this->client->request('GET', $url);

        $this->assertResponseIsSuccessful();

        /*
         * Review!: Instead of fully checking the structure we could just check if the values are present,
         * so that if we add a new field it doesn't break the test... but that could be a good thing too, i guess..
         */
        $expectedResponse = json_encode([
            'message' => 'Index action from our DemoController Bundle!',
            'result' => 11,
            'config' => [
                '#1' => 'Some Random Test String',
            ],
        ]);

        $this->assertJsonStringEqualsJsonString($expectedResponse, $this->client->getResponse()->getContent());
    }

    public function testViewAction(): void
    {
        // Test Twig: Must add twig as a requirement to the librario composer
        $this->assertTrue(true);
    }

    public function testDispatchAction(): void
    {
        // Testing the event dispatcher / event recieved etc
        $this->assertTrue(true);
    }
}
