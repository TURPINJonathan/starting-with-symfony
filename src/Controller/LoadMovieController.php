<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Movie;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoadMovieController extends AbstractController
{
  #[Route('/load/movies', name: 'app_load_movies')]
  public function index(MovieRepository $movieRepository, GenreRepository $genreRepository): Response
  {
      $genreAction = new Genre();
      $genreAction->setName('Action');
      $genreRepository->save($genreAction);

      $genreSuperHeroes = new Genre();
      $genreSuperHeroes->setName('Super Heroes');
      $genreRepository->save($genreSuperHeroes);

      $movie = new Movie();
      $movie->setName('The Matrix');
      $movie->setDescription('Neo takes red pill');
      $movie->setGenre($genreAction);
      $movie->setYear(1999);
      $movieRepository->save($movie);

      $movie = new Movie();
      $movie->setName('Jurassic Park');
      $movie->setDescription('Dinosaurs, Dinosaurs everywhere');
      $movie->setGenre($genreAction);
      $movie->setYear(1993);
      $movieRepository->save($movie);

      $movie = new Movie();
      $movie->setName('Black Panther');
      $movie->setDescription('Another superhero');
      $movie->setGenre($genreSuperHeroes);
      $movie->setYear(2018);
      $movieRepository->save($movie, true);

      return $this->render('movie/index.html.twig', [
        'controller_name' => 'MovieController',
    ]);;
  }
}
