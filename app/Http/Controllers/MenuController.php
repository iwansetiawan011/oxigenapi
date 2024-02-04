<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $menu = Menu::join('menu_categories', 'menus.menu_category_id', '=', 'menu_categories.id')
            ->select('menus.*', 'menu_categories.category_name')
            ->where('product_name', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        $category = MenuCategory::all();

        $title_alert = 'Delete Menu!';
        $text_alert = "Are you sure you want to delete?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.menu.index',
            [
                'title' => 'Menu',
                'data' => $menu,
                'category' => $category,
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
                'product_name' => 'required',
                'menu_category_id' => 'required',
                'product_desc' => 'required',
                'product_price' => 'required',
                'product_image' => 'required',
                'product_image.*' => 'image|mimes:jpeg,png,jpg',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("product_image")) {
            $image = $request->file("product_image");
            $destinationPath = "assets-admin/media/menus/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["product_image"] = "$profileImage";
        }

        Menu::create($input);

        Alert::success('Menu', 'Menu successfully added!');
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
    public function destroy(Menu $menu)
    {
        File::delete('assets-admin/media/menus/' . $menu->product_image);
        $menu->delete();

        Alert::success('Product', 'Product successfully deleted!');
        return back();
    }
}
