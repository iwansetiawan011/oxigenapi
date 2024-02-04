<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\OrderTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function temp_create(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $total_stock = $product->stock - $request->quantity;

        // cek ketersediaan stok
        if ($total_stock < 0) {
            Alert::warning('Stok tidak mencukupi!', 'Silahkan tambahkan stok terlebih dahulu');
            return back();
        } else {
            $temp = OrderTemp::where('product_id', $request->product_id)->first();

            // cek apakah data yg di tambahkan itu sama
            if (!empty($temp) || $temp == !null) {
                $total_stock = $product->stock - ($temp->quantity + $request->quantity);

                // cek ketersediaan stok
                if ($total_stock < 0) {
                    Alert::warning('Stok tidak mencukupi!', 'Silahkan tambahkan stok terlebih dahulu');
                    return back();
                } else {
                    // menambahkan quantity produk yg lama
                    $temp->quantity = $temp->quantity + $request->quantity;

                    // mengupdate subharga
                    $temp->sub_price = $product->price * $temp->quantity;

                    $temp->update();
                    return back();
                }
            } else {

                // masukkan ke tabel sementara
                $temp = new OrderTemp();
                $temp->product_id = $request->product_id;
                $temp->quantity = $request->quantity;
                $temp->user_unique = Session::getId();
                $temp->sub_price = $product->price * $request->quantity;

                $temp->save();
                return back();
            }
        }
    }

    public function temp_destroy($id)
    {
        $temp = OrderTemp::find($id);
        $temp->delete();
        return back();
    }

    public function temp_update(Request $request, $id)
    {
        $action = $request->input('action');
        $slug = $request->input('product_slug');

        $temp = OrderTemp::where('id', $id)->first();
        $product = Product::where('product_slug', $slug)->first();

        if ($action === 'add') {
            // var_dump($action, $slug, $temp, $product);
            $total_stock = $product->stock - ($product->quantity + 1);
            if ($total_stock < 0) {
                Alert::warning('Stok tidak mencukupi!', 'Silahkan tambahkan stok terlebih dahulu');
                return back();
            } else {
                $temp->quantity = $temp->quantity + 1;
                $temp->sub_price = $product->price * $temp->quantity;
                $temp->update();

                return response()->json([
                    'success' => true,
                    'quantity' => $temp->quantity,
                    'sub_price' => $temp->sub_price
                ]);
            }
        } elseif ($action === 'remove') {
            // var_dump($action, $slug, $temp, $product);

            $temp->quantity = $temp->quantity - 1;
            $temp->sub_price = $product->price * $temp->quantity;
            $temp->update();

            return response()->json([
                'success' => true,
                'quantity' => $temp->quantity,
                'sub_price' => $temp->sub_price,
            ]);
        }
    }

    public function checkout()
    {
        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();

        $total_price = $temps->sum('sub_price');

        $count = $temps->count();

        $lastOrderId = Order::max('id');
        $nextId = $lastOrderId + 1;
        $no_ref = "ORDER-" . $nextId . mt_rand(100, 999);

        return view('shop-checkout', compact('temps', 'count', 'total_price', 'no_ref'));
    }

    public function order_create(Request $request)
    {
        $data = $request->all();

        $order = Order::create([
            'no_referensi' => $data['no_referensi'],
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'province' => $data['province'],
            'postcode' => $data['postcode'],
            'phone' => $data['phone'],
            'total_price' => $data['total_price'],
            'status' => 'pending',
            'snap_token' => '',
        ]);

        $session = session()->getId();

        $temps = OrderTemp::where('user_unique', $session)->get();
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();


        foreach ($temps as $temp) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $temp->product_id;
            $order_detail->quantity = $temp->quantity;
            $order_detail->price = $temp->sub_price;
            $order_detail->save();

            $temp->delete();

            $product = Product::find($temp->product_id);
            $product->stock = $product->stock - $temp->quantity;
            $product->update();
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        // Collect items from the order details
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();

        // Create item details array dynamically
        $itemDetails = array();
        foreach ($orderDetails as $detail) {
            $itemDetails[] = array(
                'id'        => $detail->product_id,
                'name'      => $detail->product->product_name,
                'quantity'  => $detail->quantity,
                'price'     => $detail->product->price,
                'sub_total'     => $detail->sub_price,
            );
        }

        $params = array(
            'transaction_details' => array(
                'order_id'      => $order->no_referensi,
                'gross_amount'  => $order->total_price,
            ),
            'item_details' => $itemDetails,
            'customer_details' => array(
                'first_name'       => $order->name,
                'email'            => $order->email,
                'phone'            => $order->phone,
                'shipping_address' => array(
                    'first_name'   => $order->name,
                    'address'      => $order->address,
                    'city'         => $order->city,
                    'postal_code'  => $order->postcode,
                    'phone'        => $order->phone,
                    'country_code' => 'IDN',
                ),
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $order->snap_token = $snapToken;

        $order->save();

        return redirect()->route('shop-payment', ['id' => $order->id]);
    }

    public function payment($id)
    {
        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();


        $count = $temps->count();

        $order = Order::where('id', $id)->first();

        // $total_price = $temps->sum('sub_price');

        return view('shop-payment', compact('order', 'count', 'temps'));
    }
}
