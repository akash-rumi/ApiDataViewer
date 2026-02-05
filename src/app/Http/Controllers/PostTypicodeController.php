<?php

namespace App\Http\Controllers;

use App\Models\PostTypicode;

class PostTypicodeController extends Controller {
    public function index() {
        $posts = PostTypicode::paginate(15);
        return view('postsTypicode.index', compact('posts'));
    }
}
