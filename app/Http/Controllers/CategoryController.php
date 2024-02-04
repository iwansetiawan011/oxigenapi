<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = Category::where('category_name', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        $title_alert = 'Delete Category!';
        $text_alert = "Are you sure you want to delete?";
        confirmDelete($title_alert, $text_alert);

        // $category = Category::all();

        return view(
            'admin.category.index',
            [
                'title' => 'Categories',
                'data' => $category
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required',
                'category_slug' => 'required',
            ]
        );

        Category::create($request->all());

        Alert::success('Category', 'Category successfully added!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'category_name' => 'required',
                'category_slug' => 'required',
            ]
        );

        $category->update($request->all());

        Alert::success('Category', 'Category successfully added!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Alert::success('Category', 'Category successfully deleted!');
        return back();
    }
}
