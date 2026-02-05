<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiFetcherTypicode;
use App\Models\PostTypicode;

class FetchTypicodePosts extends Command {
    protected $signature = 'fetch:typicode-posts';
    protected $description = 'Fetch posts from jsonplaceholder.typicode.com';

    public function handle(ApiFetcherTypicode $fetcher) {
        $posts = $fetcher->fetchPosts();
        foreach ($posts as $post) {
            PostTypicode::updateOrCreate(
                ['id' => $post['id']],
                [
                    'user_id' => $post['userId'], 
                    'title' => $post['title'], 
                    'body' => $post['body']
                ]
            );
        }
        $this->info("Typicode posts stored successfully!");
    }
}
