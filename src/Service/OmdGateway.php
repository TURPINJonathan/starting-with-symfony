<?php
declare(strict_types=1);
// Permet la compatibilité selon les versions

namespace App\Service;

use App\Entity\Movie;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OmdGateway
{
  // Injection de dépendance
  public function __construct(
      private HttpClientInterface $httpClient,
  ) {}

  public function getPosterByMovie(Movie $movie): ?string
  {
      $response = $this->httpClient->request('GET', sprintf(
          'https://www.omdbapi.com/?apikey=%s&t=%s',
          'e0ded5e2', // => remplacera le premier %s
          $movie->getName() // => remplacera le second %s
      ));

      $movieData = $response->toArray();

      return array_key_exists('Poster', $movieData) ? $movieData['Poster'] : null;
  }
}