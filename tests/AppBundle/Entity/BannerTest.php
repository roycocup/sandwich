<?php

namespace tests\AppBundle\Controller;

use AppBundle\Entity\Banner;
use Doctrine\ORM\Mapping\Entity;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BannerTest extends WebTestCase
{
    use TestCaseTrait;
    private $_em;

    public function setUp()
    {
        parent::setUp();
        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->_em->beginTransaction();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->_em->rollback();
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new \PDO('sqlite::memory:');
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {

        $data = [
            ['bid' => 'b001', 'url' => 'https://mercari.com/lp/b001.html', 'start' =>'01-04-2017 00:00:00', 'end' => '30/04/2017 00:00:00', 'priority' => 10],
            ['bid' => 'b002', 'url' => 'https://mercari.com/lp/b002.html', 'start' =>'01-05-2017 00:00:00', 'end' => '31/08/2017 00:00:00', 'priority' => 10],
            ['bid' => 'b003', 'url' => 'https://mercari.com/lp/b003.html', 'start' =>'01-03-2017 00:00:00', 'end' => '31/12/2017 00:00:00', 'priority' => 5],
            ['bid' => 'b004', 'url' => 'https://mercari.com/lp/b004.html', 'start' =>'01-10-2017 00:00:00', 'end' => '15/10/2017 00:00:00', 'priority' => 20],
            ['bid' => 'b005', 'url' => 'https://mercari.com/lp/b005.html', 'start' =>'15-04-2017 00:00:00', 'end' => '14/05/2017 00:00:00', 'priority' => 20],
        ];

        return $this->createArrayDataSet($data);

    }

    public function testEntityHasRequiredFields()
    {
        self::assertClassHasAttribute('bid', Banner::class);
        self::assertClassHasAttribute('url', Banner::class);
        self::assertClassHasAttribute('start', Banner::class);
        self::assertClassHasAttribute('end', Banner::class);
        self::assertClassHasAttribute('priority', Banner::class);
    }


//    public function testDbOperations()
//    {
//        $ds = new QueryDataSet($this->getConnection());
//
//        $ds->addTable('banner');
//        $names = $ds->getTableNames();
//
//        var_dump($names); die;
//    }

    private function _persistAndFlush(Banner $e)
    {
        $this->_em->persist($e);
        $this->_em->flush();
    }

    /**
     * @expectedException  Exception
     */
    public function testThrowsExceptionSavingEmpty()
    {
        $data = $this->getDataSet();
        $ent = new Banner();
        var_dump($data); die;
        //$ent->setBid($data[0]['bid']);
        $this->_persistAndFlush($ent);

        self::assertNotEmpty($ent->getBid());



    }

//    public function testEntitySaves()
//    {
//        $data = $this->getProvidedData();
//        $ent = new Banner();
//        $ent->setBid($data[0]['bid']);
//        $this->_persistAndFlush($ent);
//
//        self::assertNotEmpty($ent->getBid());
//
//    }




}

