<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $menu = Menu::join('menu_categories', 'menus.menu_category_id', '=', 'menu_categories.id')
                ->select('menus.*', 'menu_categories.category_name')->get();

            $menu->transform(function ($item, $key) {
                $item['image_path'] = asset("assets/images/{$item['product_image']}");
                return $item;
            });
            return response()->json($menu, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
