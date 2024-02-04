<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $menu_category = MenuCategory::where('category_name', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        $title_alert = 'Delete Menu Category!';
        $text_alert = "Are you sure you want to delete?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.menu_category.index',
            [
                'title' => 'Menu Categories',
                'data' => $menu_category
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
                'category_image' => 'required',
                'category_image.*' => 'image|mimes:jpeg,png,jpg',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("category_image")) {
            $image = $request->file("category_image");
            $destinationPath = "assets-admin/media/menus/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["category_image"] = "$profileImage";
        }

        MenuCategory::create($input);

        Alert::success('Menu Category', 'Menu Category successfully added!');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menuCategory)
    {
        File::delete('assets-admin/media/menus/' . $menuCategory->category_image);
        $menuCategory->delete();

        Alert::success('Product Image', 'Product image successfully deleted!');
        return back();
    }
}
