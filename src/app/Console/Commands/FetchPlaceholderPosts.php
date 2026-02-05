<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Services\ApiFetcherPlaceholderOrg;
use App\Models\PostPlaceholderOrg;

class FetchPlaceholderPosts extends Command {
    protected $signature = 'fetch:placeholder-posts';
    protected $description = 'Fetch posts from jsonplaceholder.org';

    public function handle(ApiFetcherPlaceholderOrg $fetcher) {
        try {
            $posts = $fetcher->fetchPosts();
            foreach ($posts as $post) {
                PostPlaceholderOrg::updateOrCreate(
                    ['id' => $post['id']],
                    [
                        'slug' => $post['slug'],
                        'url' => $post['url'],
                        'title' => $post['title'],
                        'content' => $post['content'],
                        'image' => $post['image'] ?? null,
                        'thumbnail' => $post['thumbnail'] ?? null,
                        'status' => $post['status'] ?? 'draft',
                        'category' => $post['category'] ?? null,
                        'published_at' => !empty($post['publishedAt']) ? Carbon::createFromFormat('d/m/Y H:i:s', $post['publishedAt']) : null,
                        'updated_at_api' => !empty($post['updatedAt']) ? Carbon::createFromFormat('d/m/Y H:i:s', $post['updatedAt']) : null,
                        'user_id' => $post['userId'],
                    ]
                );
            }
            $this->info("Placeholder.org posts stored successfully!");
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}

