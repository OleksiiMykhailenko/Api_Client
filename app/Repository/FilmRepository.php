<?php

namespace App\Repository;

use App\Films;

class FilmRepository implements FilmRepositoryInterface
{
    /**
     * @var Films;
     */
    private $model;

    public function __construct()
    {
        $this->model = app(Films::class);
    }

    public function findFilmByTitle(string $title): ?Films
    {
        $film = $this->model->where('title', 'like', "%$title%")->first();
        return $film;
    }

    public function addFilm(array $data): array
    {
        $data = $this->toDbArray($data);
        $this->model->create($data);
        return $data;
    }

    private function toDbArray(array $apiResponse): array
    {
        return [
            'title' => $apiResponse['Title'],
            'year' => $apiResponse['Year'],
            'director' => $apiResponse['Director'],
            'plot' => $apiResponse['Plot'],
            'poster' => $apiResponse['Poster'],
            'imdb_id' => $apiResponse['imdbID'],
            'production' => $apiResponse['Production'],
            'website' => $apiResponse['Website']
        ];
    }
}