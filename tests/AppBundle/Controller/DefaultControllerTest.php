<?php

namespace Tests\AppBundle\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Controller\DefaultController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultControllerTest extends TestCase
{


    public function testIndexIsLive()
    {
        $m = $this->createMock('AppBundle\Controller\DefaultController');
        $m->method('respond');



        self::assertEquals(, $t);
        //$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
