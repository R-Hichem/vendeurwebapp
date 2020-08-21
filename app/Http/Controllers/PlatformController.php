<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderProduct;

class PlatformController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
    
    }

    public function show($id){
        if (Product::find($id)) {
           return view('platforme.ProductDetails',[
               'product' => Product::find($id),
           ]);
        }
        abort(404);
    }

    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->unit_price,
            'quantity' => $request->quantity,
            'associatedModel' => $product
        ]); 
        return redirect()->back()->with('status', 'PRODUCT ADDED TO THE CART YEAH !!!');
        }

    public function showCart(Request $request){
            return view('platforme.Cart', [
            'products' => \Cart::getContent(),
            'total' => \Cart::getTotal(),
            'isEmpty' => \Cart::isEmpty()
        ]);
    }

    
    public function checkoutIndex(Request $request){
            return view('platforme.CheckoutIndex');
    }

    public function checkoutFinalize(Request $request){
        $order = new Order();
        $order->code = $random = \Str::random(20);
        $order->ammount = \Cart::getTotal();
        $order->payed = false;
        $order->shipped = false;
        $order->client_name = $request->name;
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();

        foreach (\Cart::getContent() as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->associatedModel->id;
            $orderProduct->quantity = $product->quantity;
            $orderProduct->created_at = now();
            $orderProduct->updated_at = now();
            $orderProduct->save();
        }

        \Cart::clear();
        return view('platforme.CheckoutFinalized', [
            'code' => $order->code,
            'email' => $order->email,
        ]);
    }


}