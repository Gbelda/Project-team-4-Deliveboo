<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){


            $orders = Auth::user()->orders()->orderByDesc('created_at')->get();
            return view('admin.orders.index', compact('orders'));
            

    }
    public function show(Order $order){
        //ddd(Auth::id());
        if (Auth::id() === $order->user_id) {
            $orders = Order::all();
            return view('admin.orders.show', compact('order'));

        } else {
            abort(403);
        }
    }
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect()->route('admin.orders.index')->with('message', "L'ordine di " .  $order->client_name . " è stato eliminato correttamente");

    }
}
