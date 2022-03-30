<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','asc');
        if(request('search')) {
            $categories->where('category', 'like', '%'.request('search'). '%');
        }
        return view('dashboard.category.index', [
            'categories' => $categories->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            'category' => 'required',
            'user_input' => 'required',
            'user_update' => 'required',
            'status' => ''
        ]);

        $validatedData['tanggal_input'] = Carbon::now()->toDateString();
        
        if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
            $validatedData['status'] = 1;
        } else {
            $validatedData['status'] = 0;
        }

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Berhasil Menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'user_input' => 'required',
            'user_update' => 'required',
            'status' => ''
        ]);
        
        $validatedData['tanggal_input'] = $category->tanggal_input;

        if (isset($validatedData['status']) && $validatedData['status'] == 'on') {
            $validatedData['status'] = 1;
        } else {
            $validatedData['status'] = 0;
        }

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Berhasil Mengubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Kategori Berhasil Di Hapus!');
    }
}
