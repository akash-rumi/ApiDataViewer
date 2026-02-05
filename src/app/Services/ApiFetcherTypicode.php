<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiFetcherTypicode {
    public function fetchPosts(): array {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        if ($response->failed())
            throw new \Exception("API fetch failed");
        return $response->json();
    }
}
