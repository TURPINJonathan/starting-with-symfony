<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
  #[Route('/movie', name: 'app_movie')]
  public function index(): Response
  {
    return $this->render('movie/index.html.twig', [
      'controller_name' => 'MovieController',
    ]);
  }

  #[Route('/movie/list', name: 'app_movie_list')]
  public function list(MovieRepository $movieRepository): Response
  {
    // En appelant MovieRepository en paramètre de la méthode, nous aurons alors accès à ses propres méthodes
    // Nous pouvons donc utiliser la méthode findAll() de MovieRepository
    $moviesList = $movieRepository->findAll();

    // .. afin de transmettre l'objet à la vue
    return $this->render('movie/list.html.twig', [
      'movies_list' => $moviesList,
    ]);
  }

  // Le requirements sur Route permet de faire les distingo entre /movie/1 et /movie/list
  #[Route('/movie/{id}', name: 'app_movie_show', requirements: ['id' => '\d+'])]
  public function show(Movie $movie): Response
  {
    return $this->render('movie/show.html.twig', [
      'movie' => $movie,
    ]);
  }
}
