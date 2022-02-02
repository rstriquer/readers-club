<?php

namespace App\Services\Contracts;

interface ApiServiceInterface
{
    /**
     * Imports data from remote partner API into system cache
     * - gets data from cache, if exists;
     * - caches data for a day;
     * @param string $isbn
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function getCachedData(string $isbn) : array;
}