<?php

namespace App\Http\Controllers;

use App\Models\NewsInd;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreNewsIndRequest;
use App\Http\Requests\UpdateNewsIndRequest;

class NewsIndController extends Controller
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
        return view('homepage', [
            "section" => "Berita",
            "berita" => $berita->paginate(16)
        ]);
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
     * @param  \App\Http\Requests\StoreNewsIndRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsIndRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
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
     * @param  \App\Http\Requests\UpdateNewsIndRequest  $request
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsIndRequest $request, NewsInd $newsInd)
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
