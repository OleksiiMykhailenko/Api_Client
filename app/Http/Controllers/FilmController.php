<?php

namespace App\Http\Controllers;

use App\Repository\FilmRepositoryInterface;
use App\Service\OmdbService;
use App\Service\OmdbServiceInterface;
use Illuminate\Http\Request;

class FilmController extends Controller
{
        private $omdbService;
        private $filmReository;

        public function __construct(
            OmdbServiceInterface $omdbService,
            FilmRepositoryInterface $filmRepository
        ) {
        $this->omdbService = $omdbService;
        $this->filmReository = $filmRepository;
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $title = $request->title;

        $filmEntity = $this->filmReository->findFilmByTitle($title);
        if (!$filmEntity) {
            $film = $this->omdbService->find($title);
            if (empty($film)) {
                return response()->json(
                    [
                        'message' => 'film not found'
                    ]
                );
            }
            $result = $this->filmReository->addFilm($film);
        } else {
            unset($filmEntity->id);
            unset($filmEntity->created_at);
            unset($filmEntity->updated_at);
            $result = $filmEntity;
        }
        return response()->json($result);
    }
}
