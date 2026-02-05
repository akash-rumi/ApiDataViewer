<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiFetcherPlaceholderOrg { 
    public function fetchPosts() { 
        $response = Http::get('https://jsonplaceholder.org/posts'); 
        if ($response->failed()) 
            throw new \Exception("Placeholder.org API failed"); 
        return $response->json(); 
    } 
}