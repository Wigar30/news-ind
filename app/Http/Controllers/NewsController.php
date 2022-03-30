<?php

namespace App\Http\Controllers;

use App\Models\NewsInd;
use App\Exports\NewsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = NewsInd::latest('tanggal_berita')->where('status', 1);

        if(request('search')) {
            $berita->where('title', 'like', '%'.request('search'). '%')->orWhere('content', 'like', '%'.request('search'). '%');
        }
        return view('homepage.homepage', [
            "section" => "Berita",
            "berita" => $berita->paginate(16)
        ]);
    }

    public function category($category)
    {
        $berita = NewsInd::where('category', $category)->orderBy('tanggal_berita','asc');

        return view('homepage.homepage', [
            "section" => "Berita",
            "berita" => $berita->paginate(16)
        ]);
    }

    public function export()
	{
		return Excel::download(new NewsExport, 'news.xlsx');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function show(NewsInd $news)
    {
        return view('homepage.news', [
            'section' => 'Berita',
            'berita' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsInd $newsInd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsInd $newsInd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsInd $newsInd)
    {
        //
    }
}
