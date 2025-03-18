<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $sProduct = Product::where('status','=',1)->get();
        return view('home', compact('sProduct'));
    }

    public function cart()
    {
        $user_id = $user_id = auth()->user()->id;
        $sCart = Cart::select('products.*','carts.id as cart_id','carts.product_id as cart_product_id','carts.user_id as cart_user_id')
                ->join('products','carts.product_id','products.id')
                ->where('user_id','=', $user_id)
                ->whereNotNull('user_id')
                ->get();

        return view('cart',compact('sCart'));        
    }
    
    public function remove_cart($id)
    {
        $sCart = Cart::find($id)->delete();
        return redirect()->back()->with('success','Item Remove from Cart');
    }

    public function add_to_cart(Request $request)
    {
        $user_id = auth()->user()->id ?? null;
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
    
        $iCart = new Cart();
        $iCart->product_id = $request->product_id;
        $iCart->user_id = $request->user_id;
        $iCart->save();
    
        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function checkout(Request $request)
    {
        $cartData = json_decode($request->cart_data, true);
        $grandTotal = $request->grand_total;

        return view('checkout', compact('cartData', 'grandTotal'));
    }

    public function save_checkout(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'grand_total' => 'required|numeric',
            'products' => 'required|array',
        ]);
    
        // Store checkout details
        $checkout = new Checkout();
        $checkout->first_name = $validated['first_name'];
        $checkout->last_name = $validated['last_name'];
        $checkout->email = $validated['email'];
        $checkout->address = $validated['address'];
        $checkout->city = $validated['city'];
        $checkout->postcode = $validated['postcode'];
        $checkout->total_price = $validated['grand_total'];
        $checkout->save();
    
        foreach ($validated['products'] as $product) {
            $product = json_decode($product, true);
            CheckoutProduct::create([
                'checkout_id' => $checkout->id,
                'product_name' => $product['product_name'],
                'quantity' => $product['quantity'],
                'price' => $product['total'],
            ]);
        }
    
        return redirect()->route('landing_page');
    }

}
