<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Http\Controllers\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        
        $productId = $request->input('product_id');
        $clientId = $request->input('client_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $image = $request->input('image');
        
        // Save the cart item to the database
        Cart::create([
            'product_id' => $productId,
            'client_id' => $clientId,
            'quantity' => $quantity,
            'price' => $price,
            'image'=>$image,
        ]);
        
        $count = cart::where('client_id',$clientId)->count();
        \Session::put('CartCount',$count);
        return response()->json(['message' => 'Item added to cart successfully']);
    }

    public function remove(Request $request)
    {
        // Retrieve the product_id and client_id from the request
        $productId = $request->input('product_id');
        $clientId = $request->input('client_id');

        // Find the cart item to remove
        $cartItem = Cart::where('product_id', $productId)
                        ->where('client_id', $clientId)
                        ->first();

        if ($cartItem) {
            // Delete the cart item from the database
            $cartItem->delete();
            $count = cart::where('client_id',$clientId)->count();
            \Session::put('CartCount',$count);
            // Return a response indicating success
            return response()->json(['message' => 'Item removed from the cart successfully']);
        } else {
            // Return a response indicating failure
            return response()->json(['message' => 'Item not found in the cart'], 404);
        }
    }

    public function checkEntry(Request $request)
    {
        $productId = $request->input('product_id');
        $clientId = $request->input('client_id');

        // Check if the cart entry exists for the given product and client
        $cartEntry = Cart::where('product_id', $productId)
            ->where('client_id', $clientId)
            ->first();

        if ($cartEntry) {
            // Cart entry exists
            return response()->json(['exists' => true]);
        } else {
            // Cart entry does not exist
            return response()->json(['exists' => false]);
        }
    }

    public function getCartItems(Request $request)
   {
    \Log::info('=====================================================');
    \Log::info(\Auth()->user());
    \Log::info('=====================================================');
    
    $clientId = \Auth()->user()->id;
    $cartItems = Cart::where('client_id', $clientId)->where('status','0')->with('product')->get();   
    return response()->json(['cartItems' => $cartItems]);
   }


   public function removefromcart(Request $request)
{
    $cartId = $request->input('cart_id');
    $clientId = $request->input('client_id');

    // Find the cart item that matches the given product_id and client_id
    Cart::where('id', $cartId)
        ->where('client_id', $clientId)
        ->delete();

        $count = cart::where('client_id',$clientId)->count();
        \Session::put('CartCount',$count);
        return response()->json(['message' => 'Product removed from cart.']);
    
}
public function CartProduct()
{
     $client_id =@auth()->user()->id;
     $cartItems = Cart::where('client_id', $client_id)->with('cartItems.product')->where('status','0')->get();
     return view('cart-product', compact('cartItems'));
    

}
public function update(Request $request, $cart_id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:100000',
        'client_id' => 'required|integer',
    ]);

    $cartItem = Cart::where('id', $cart_id)
        ->where('client_id', $request->client_id)
        ->first();

    if (!$cartItem) {
        
        return response()->json(['error' => 'Cart item not found for the client.'], 404);
    }

    Cart::where('id', $cart_id)
        ->where('client_id', $request->client_id)
        ->update(['quantity' => $request->quantity]);

    // Fetch the updated price and return it
    $product =Product::where('id', $cartItem->product_id)->first();
    $updatedPrice = $product->price;
    $count = cart::where('client_id',$request->client_id)->count();
        \Session::put('CartCount',$count);
    return response()->json(['price' => $updatedPrice]);
}
public function fetchCartQuantities()
{
    // Retrieve the currently logged-in user ID
    $clientId = auth()->user()->id;

    // Retrieve the cart items for the current user from the database
    $cartItems = Cart::where('client_id', $clientId)->get(['id', 'quantity']);

    return response()->json($cartItems);
}

public function deleteFromCart(Request $request)
    {
        $cartId = $request->input('cart_id');
        $clientId = $request->input('client_id');
        // Find the cart item by ID and delete it
        $cartItem = Cart::find($cartId);
        if ($cartItem) {
            $cartItem->delete();
            $count = cart::where('client_id',$clientId)->count();
            \Session::put('CartCount',$count);
            return response()->json(['message' => 'Cart item removed successfully'])
                ->header('Cache-Control', 'no-store, private, max-age=0');
        } else {
            return response()->json(['error' => 'Cart item not found'], 404)
                ->header('Cache-Control', 'no-store, private, max-age=0');
        }
    }

    public function clearCartItems()
{
    $client_id = auth()->user()->id;

    // Clear all cart items created by the user
    Cart::where('client_id', $client_id)->delete();
    $count = cart::where('client_id',$client_id)->count();
    \Session::put('CartCount',$count);

    return response()->json(['success' => true, 'message' => 'Cart items cleared successfully.']);
}
}