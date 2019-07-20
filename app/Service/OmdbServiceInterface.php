<?php

namespace App\Service;

interface OmdbServiceInterface
{
    public function find(string $title): array;
}