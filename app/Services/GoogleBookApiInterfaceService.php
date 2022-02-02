<?php

namespace App\Services;

use App\Models\Author;
use App\Models\UserBook;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GoogleBookApiInterfaceService
{
    const PARTNER_CACHE_KEY = 'google.isbn.';

    public function getCachedData(string $isbn) : array
    {
        $result = Cache::get(self::PARTNER_CACHE_KEY . $isbn);
        if ($result === null) {
            $result
                = app(
                    Client::class,
                    ['config' => ['base_uri' => 'https://www.googleapis.com']]
                )
                ->request('GET', '/books/v1/volumes?q=isbn:' . $isbn)
                ->getBody()
                ->getContents();
            $result = data_get(json_decode($result, true), 'items.0');
            $result = [
                'title' => data_get($result, 'volumeInfo.title'),
                'authors' => (array)data_get($result, 'volumeInfo.authors'),
                'thumbnail' => data_get($result, 'volumeInfo.imageLinks.thumbnail'),
                'previewLink' => data_get($result, 'volumeInfo.previewLink'),
                'publisher' => data_get($result, 'volumeInfo.publisher'),
                'published' => data_get($result, 'volumeInfo.publishedDate'),
                'pageCount' => data_get($result, 'volumeInfo.pageCount'),
                'isbn' => $isbn,
                'id_api' => data_get($result, 'id'),
            ];
            Cache::put(
                self::PARTNER_CACHE_KEY . $isbn,
                $result,
                now()->addDay()
            );
        }
       return $result;
    }
}
