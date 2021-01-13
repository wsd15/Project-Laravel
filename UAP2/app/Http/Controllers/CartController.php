<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\User;
use App\Cart;
use Auth;
use App\Transaction;
use App\DetailTransaction;
use App\DetailCart;
use Carbon\Carbon;
use Dotenv\Validator;


use Illuminate\Support\Facades\Hash;


class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function viewCart() {
        $vcart = Cart::where('user_id', Auth::user()->id)->first();
        $vtr = Transaction::where('cart_id', $vcart->id)->get();
        return view('viewcart', compact('vcart', 'vtr'));
    }

    public function edit($id){
        $vtr = Transaction::where('id', $id)->first();
        $vcart = Cart::where('id', $vtr->cart_id)->first();
        return view('viewcart', compact('vtr', 'vcart'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantity'=>'required|numeric',
        ]);

        $updvtr = Transaction::where('id', $id)->first();
        $vcart = Cart::where('id', $updvtr->cart_id)->first();
        $vcart->quantity = $vcart->quantity-$updvtr->total_qty;
        $updvtr->total_qty = $request->qty;
        $vcart->quantity = $vcart->quantity+$updvtr->total_qty;

        $vcart->update();
        $updvtr->update();
        return redirect('view-cart');
    }

    public function delete($id) {
        $delvtr = Transaction::where('id', $id)->first();
        $vcart = Cart::where('id', $delvtr->cart_id)->first();
        $vcart->price = $vcart->price-$delvtr->total_price;
        $vcart->quantity = $vcart->quantity-$delvtr->total_qty;
        
        $vcart->update();
        $delvtr->delete();
        return redirect('view-cart');
    }

    public function checkout(){
        $date = Carbon::now();
        $checkvcart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_id = $checkvcart->id;

        $dcart = new DetailCart;
        $dcart->user_id = Auth::user()->id;
        $dcart->date = $date;
        $dcart->quantity = $checkvcart->quantity;
        $dcart->price = $checkvcart->price;
        $dcart->save();

        // $checkvcart->delete();

        $checkvcart->price = 0;
        $checkvcart->quantity = 0;
        $checkvcart->update();

        $vtr = Transaction::where('cart_id', $cart_id)->get();
        foreach($vtr as $tr){
            $pizdet = Pizza::where('id', $tr->pizza_id)->first();
            $detvtr = new DetailTransaction;
            $detvtr->pizza_id = $pizdet->id;
            $detvtr->cart_id = $dcart->id;
            $detvtr->total_qty = $tr->total_qty;
            $detvtr->total_price = $tr->total_price;

            $detvtr->save();

            $tr->delete();
        }

        return redirect('');
    }

    public function history() {
        $dcart = DetailCart::where('user_id', Auth::user()->id)->get();
        // $dcart = DetailCart::get();
        return view('trhistory', compact('dcart'));
    }

    public function trdetail($id) {
        // $trdcart = DetailCart::find($id);
        $trdtr = DetailTransaction::where('cart_id', $id)->get();
        return view('trdetail', compact('trdtr'));
    }

    public function alltrhistory() {
        $alldcart = DetailCart::get();
        // $userdet = User::where('id', $alldcart->user_id)->get();
        return view('alltrhistory', compact('alldcart'));
    }
}
