<?php

namespace App\Service;

use App\Repository\FilmRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Response;

class OmdbService implements OmdbServiceInterface
{

    private $client;
    private const APIKEY = '8d67c30';
    private $filmRepository;

    public function __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
        $this->client = new Client([
            'base_uri' => 'http://www.omdbapi.com/'
        ]);
    }

    /**
    * @param string $title
    * @return array
    */
    public function find(string $title):array {
        $options = [
            'query' => [
                't' => $title,
                'apikey' => self::APIKEY
                ],
            ];

    $request = $this->client->get('/', $options);
    //dd($request->getStatusCode());
    if ($request->getStatusCode() != Response::HTTP_OK) {
        return [];
    }
    $response = $request->getBody()->getContents();
    return json_decode($response, true);
    }
}