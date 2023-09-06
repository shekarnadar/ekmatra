<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

class OrderController extends Controller
{
    public function checkout()
{
    $user = auth()->user();
    $cartItems = Cart::where('client_id', $user->id)->where('status', '0')->get();

    // Calculate the total amount and create the order
    $totalAmount = 0;
    $orderItems = [];

    foreach ($cartItems as $cartItem) {
        $totalAmount += $cartItem->quantity * $cartItem->product->price;
        $orderItems[] = [
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ];
    }

    if ($totalAmount > 0 && !empty($orderItems)) {
        // Create the order
        $order = new Order();
        $order->client_id = $user->id;
        $order->total_amount = $totalAmount;
        $order->save();

        // $email = $user->email;
        // Mail::to($email)->send(new OrderPlaced($order)); // Send email to client
        // Mail::to('ekmatra@mailinator.com')->send(new OrderPlaced($order)); // Send email to admin

        // Create order items
        foreach ($orderItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        // Update cart status to 1 (checked out)
        $cartItems->each(function ($cartItem) {
            $cartItem->update(['status' => 1]);
            $cartItem->delete();
        });

        // Update cart count
        $cartCount = Cart::where('client_id', $user->id)->where('status', '0')->count();
        session(['CartCount' => $cartCount]);

        // Flash a success message
        Session::flash('order_placed', true);

        return redirect()->route('cart-product')->with('success', 'Checkout successful!');
    } else {
        return redirect()->route('cart-product')->with('error', 'Cart is empty or total amount is zero.');
    }
}


}
