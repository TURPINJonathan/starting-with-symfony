<?php

namespace App\Tests;

use Exception;
use App\DataFixtures\MovieFixtures;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;

class MovieTest extends WebTestCase
{
    private ReferenceRepository $fixtures;
    
    /**
     * @throws Exception
     * @return void
     */
    // La method setup() d'un test sera toujours éxecutée avant tout
    public function setup(): void
    {
      self::bootKernel();

      /**
       * @var EntityManagerInterface $entityManagerInterface
       */
      $entityManager = self::getContainer()->get(EntityManagerInterface::class);

      $purger = new ORMPurger($entityManager);
      $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);

      $fixtureExecutor = new ORMExecutor(
        $entityManager,
        $purger,
      );

      $this->fixtures = $fixtureExecutor->getReferenceRepository();

      $fixtureExecutor->execute([new MovieFixtures()]);

      self::ensureKernelShutdown();

    }
    public function testItShowsAMovie(): void
    {
        $client = static::createClient();
        $idJurassicMovie = $this->fixtures->getReference('movie_jurassic')->getId();
        $client->request('GET', '/movie/' . $idJurassicMovie);

        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('Jurassic Park', $responseContent);
        $this->assertStringContainsString('Dinosaurs, Dinosaurs everywhere', $responseContent);
        $this->assertStringContainsString('1993', $responseContent);
    }

    public function testItShowsAnErrorWhenMovieNotFound(): void
    {
        $client = static::createClient();
        $client->request('GET', '/movie/123');

        $this->assertResponseStatusCodeSame(404);
    }
}
