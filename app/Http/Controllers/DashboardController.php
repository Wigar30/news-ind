<?php

namespace App\Http\Controllers;

use App\Models\NewsInd;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $berita = NewsInd::$_table;
        $category = Category::$_table;
        $berita_count = NewsInd::count('id');
        $category_count = Category::count('id');
        $count['berita'] = $berita;
        $count['category'] = $category;
        $count['berita_count'] = $berita_count;
        $count['category_count'] = $category_count;
        return view('dashboard.index', [
            'berita' => $berita,
            'category' => $category,
            'berita_count' => $berita_count,
            'category_count' => $category_count
        ]);
    }
}
