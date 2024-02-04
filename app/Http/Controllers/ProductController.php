<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name', 'categories.category_slug')
            ->where('product_name', 'LIKE', '%' . $search . '%')
            ->orWhere('category_name', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        $title_alert = 'Delete Product!';
        $text_alert = "Are you sure you want to delete?";
        confirmDelete($title_alert, $text_alert);

        // $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.category_name', 'categories.category_slug')
        //     ->oldest()->get();

        return view(
            'admin.product.index',
            [
                'title' => 'Products',
                'data' => $product,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'admin.product.create',
            [
                'title' => 'Add Product',
                'menu' => 'Products',
                'category' => Category::all(),
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_name' => 'required',
                'product_slug' => 'required',
                'category_id' => 'required',
                'quantity' => 'required|numeric',
                'stock' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => 'required',
                'status' => 'required',
                'thumbnail' => 'required',
                'thumbnail.*' => 'image|mimes:jpeg,png,jpg',
                'product_images' => 'required|max:3',
                'product_images.*' => 'image|mimes:jpeg,png,jpg',
            ]
        );

        $input = $request->all();

        if ($request->hasFile("thumbnail")) {
            $image = $request->file("thumbnail");
            $destinationPath = "assets-admin/media/products/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["thumbnail"] = "$profileImage";
        }

        if ($request->hasFile("product_images")) {
            $pimages = $request->file('product_images');
            foreach ($pimages as $pimage) {
                $product_image = new ProductImage();
                $product_image->product = $input["product_slug"];

                $imageName = round(microtime(true) * 1000) . '.' . $pimage->getClientOriginalExtension();
                $pimage->move(public_path('assets-admin/media/products/'), $imageName);
                $product_image->image = "$imageName";

                $product_image->save();
            }
        }

        Product::create($input);

        Alert::success('Product', 'Product successfully added!');
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        // $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.category_name', 'categories.category_slug')->where('products.product_slug', $product->product_slug)->first();

        // $images = ProductImage::join('products', 'product_images.product', '=', 'products.product_slug')
        //     ->select('product_images.image', 'product_images.product')
        //     ->where('product_images.product', $product->product_slug)->get();

        $products = Product::with('category')
            ->where('category_id', $product->category_id)
            ->first();

        $images = Product::with('productImages')
            ->where('product_slug', $product->product_slug)
            ->first();

        // $products = Product::withCategoryAndImages($product->product_slug)->first();

        // var_dump($products);


        return view(
            'admin.product.detail',
            [
                'title' => 'Detail Product',
                'menu' => 'Products',
                'product' => $products,
                'images' => $images
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product_images = ProductImage::where('product', $product->product_slug)->get();

        $title_alert = 'Delete Product Image!';
        $text_alert = "Are you sure you want to delete?";
        confirmDelete($title_alert, $text_alert);

        return view(
            'admin.product.edit',
            [
                'title' => 'Add Product',
                'menu' => 'Products',
                'category' => Category::all(),
                'product' => $product,
                'product_images' => $product_images
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'product_name' => 'required',
                'product_slug' => 'required',
                'category_id' => 'required',
                'quantity' => 'required|numeric',
                'stock' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => 'required',
                'status' => 'required',
                'thumbnail.*' => 'image|mimes:jpeg,png,jpg'
            ]
        );
        $input = $request->all();

        if ($request->hasFile("thumbnail")) {
            File::delete('assets-admin/media/products/' . $product->thumbnail);

            $image = $request->file("thumbnail");
            $destinationPath = "assets-admin/media/products/";
            $profileImage = date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input["thumbnail"] = "$profileImage";
        } else {
            unset($input["thumbnail"]);
        }

        $product->update($input);

        Alert::success('Product', 'Product successfully updated!');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        File::delete('assets-admin/media/products/' . $product->thumbnail);
        $product->delete();

        $images = ProductImage::where('product', $product->product_slug)->get();

        foreach ($images as $img) {
            File::delete('assets-admin/media/products/' . $img->image);
            $img->delete();
        }

        Alert::success('Product', 'Product successfully deleted!');
        return redirect('/admin/product');
    }
}
