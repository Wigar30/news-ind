<?php

namespace App\Http\Controllers;

use App\Models\NewsInd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryNewsController extends Controller
{
    public function category($news) {
        $berita = NewsInd::latest('tanggal_berita')->where('category', $news);

        return view('category', [
            "section" => "Berita",
            "berita" => $berita->paginate(16)
        ]);
    }
}
