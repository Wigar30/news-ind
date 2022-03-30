<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\NewsInd;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = NewsInd::orderBy('id','asc');
        if(request('search')) {
            $berita->where('title', 'like', '%'.request('search'). '%')->orWhere('content', 'like', '%'.request('search'). '%');
        }
        return view('dashboard.news.index', [
            'berita' => $berita->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'user_input' => 'required',
            'user_update' => 'required',
            'content' => '',
            'status' => ''
        ]);

        $validatedData['tanggal_berita'] = Carbon::now()->toDateString();
        
        if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
            $validatedData['status'] = 1;
        } else {
            $validatedData['status'] = 0;
        }

        NewsInd::create($validatedData);

        return redirect('/dashboard/news')->with('success', 'Berhasil Menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function show(NewsInd $news)
    {
        return view('dashboard.news.show', [
            'berita' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsInd $news)
    {
        return view('dashboard.news.edit', [
            'berita' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsInd $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'user_input' => 'required',
            'user_update' => 'required',
            'content' => '',
            'status' => ''
        ]);
        
        $validatedData['tanggal_berita'] = $news->tanggal_berita;

        if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
            $validatedData['status'] = 1;
        } else {
            $validatedData['status'] = 0;
        }

        NewsInd::where('id', $news->id)->update($validatedData);

        return redirect('/dashboard/news')->with('success', 'Berhasil Mengubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsInd  $newsInd
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsInd $news)
    {
        NewsInd::destroy($news->id);

        return redirect('/dashboard/news')->with('success', 'Berita Berhasil Di Hapus!');
    }
}
