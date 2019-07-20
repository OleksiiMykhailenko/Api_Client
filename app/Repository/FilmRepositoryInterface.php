<?php


namespace App\Repository;

use App\Films;

interface FilmRepositoryInterface
{
    /**
     * Ищем фильм по заголовку в БД
     * @param string $title
     * @return Films|null
     */

    public function findFilmByTitle(string $title): ?Films;

    /**
     * Добавляем фильм в БД
     * @param array $data
     * @return array
     */

    public function addFilm(array $data): array;
}