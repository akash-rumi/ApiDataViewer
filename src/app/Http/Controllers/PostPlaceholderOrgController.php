<?php

namespace App\Http\Controllers;

use App\Models\PostPlaceholderOrg;

class PostPlaceholderOrgController extends Controller {
    public function index() {
        $posts = PostPlaceholderOrg::paginate(15);
        return view('postsPlaceholder.index', compact('posts'));
    }

    public function show($id) {
        $post = PostPlaceholderOrg::findOrFail($id);
        return view('postsPlaceholder.show', compact('post'));
    }
}