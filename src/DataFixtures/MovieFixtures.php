<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Movie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
      $genreAction = new Genre();
      $genreAction->setName('Action');
      $manager->persist($genreAction);

      $genreSuperHeroes = new Genre();
      $genreSuperHeroes->setName('Super Heroes');
      $manager->persist($genreSuperHeroes);

      $movie = new Movie();
      $movie->setName('The Matrix');
      $movie->setDescription('Neo takes red pill');
      $movie->setGenre($genreAction);
      $movie->setYear(1999);
      $manager->persist($movie);
      $this->addReference('movie_matrix', $movie);

      $movie = new Movie();
      $movie->setName('Jurassic Park');
      $movie->setDescription('Dinosaurs, Dinosaurs everywhere');
      $movie->setGenre($genreAction);
      $movie->setYear(1993);
      $manager->persist($movie);
      $this->addReference('movie_jurassic', $movie);

      $movie = new Movie();
      $movie->setName('Black Panther');
      $movie->setDescription('Another superhero');
      $movie->setGenre($genreSuperHeroes);
      $movie->setYear(2018);
      $manager->persist($movie);
      $this->addReference('movie_panther', $movie);

        $manager->flush();
    }
}
