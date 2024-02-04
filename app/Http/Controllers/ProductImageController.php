<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class ProductImageController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'product' => 'required',
            'product_images' => 'required|max:3',
            'product_images.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile("product_images")) {
            $jumlahImage = ProductImage::where('product', $request->product)->count();
            if ($jumlahImage < 3) {
                $total = $jumlahImage + count($request->product_images);
                if ($total <= 3) {
                    $pimages = $request->file('product_images');
                    foreach ($pimages as $pimage) {
                        $input['product'] = $request->product;

                        $imageName = round(microtime(true) * 1000) . '.' . $pimage->getClientOriginalExtension();
                        $pimage->move(public_path('assets-admin/media/products/'), $imageName);
                        $input['image'] = "$imageName";

                        ProductImage::create($input);
                    }
                    Alert::success('Product Image', 'Product image successfully added!');
                    return back();
                } else {
                    Alert::error('Product Image', 'Product image maximum 3 items!');
                    return back();
                }
            } else {
                Alert::error('Product Image', 'Product image maximum 3 items!');
                return back();
            }
        } else {
            Alert::error('Product Image', 'Product image failed to add!');
            return back();
        }
    }

    public function destroy(ProductImage $productImage)
    {

        File::delete('assets-admin/media/products/' . $productImage->image);
        $productImage->delete();

        Alert::success('Product Image', 'Product image successfully deleted!');
        return back();
    }
}
