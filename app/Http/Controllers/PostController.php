<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\NewsInd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            "title" => "Berita",
            "berita" => NewsInd::latest('tanggal_berita')->paginate(15)
        ]);
    }

    public function show($slug) {
        return view('post', [
            "title" => "Berita",
            "berita" => Post::find($slug)
        ]);
    }
}
