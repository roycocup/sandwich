<?php

namespace Tests\AppBundle\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Controller\DefaultController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends TestCase
{
    public $ctl;

    public function setUp()
    {
        parent::setUp();
        $this->ctl = new DefaultController();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->ctl = null;
    }


    public function testRespondWillReturnJsonResponse()
    {
        $data = [];

        self::assertEquals(new JsonResponse($data), $this->ctl->respond($data));

    }

    /**
     * @expectedException     ArgumentCountError
     */
    public function testIndexThrowsExceptionWithoutRequest()
    {
        $this->ctl->indexAction();
    }

    public function testIndexWillRespondJsonArray()
    {
        $request = self::createMock(Request::class);

        $response = $this->ctl->indexAction($request);

        self::assertEquals(JsonResponse::class, get_class($response));
    }

    public function testResponseIsValidJsonString()
    {
        $request = self::createMock(Request::class);
        $response = $this->ctl->indexAction($request);

        self::assertNull(
            self::isJson()->evaluate($response->getContent())
        );

    }
}
