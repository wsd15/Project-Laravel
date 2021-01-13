<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Facades\Hash;
use Auth;


class PizzaController extends Controller
{
    public function home() {
        $piz= Pizza::paginate(6);
        return view('home', compact('piz'));
    }

    public function detail($id) {
        $pizdet = Pizza::find($id);
        return view('pizdet', compact('pizdet'));
    }

    public function pizadd(){
        return view('addpiz');
    }
    public function pizupd($pizza_id){
        $pizza = Pizza::find($pizza_id);
        return view('pizupd',compact('pizza'));
    }

//    public function add(Request $request){
//        $this->validate($request,[
//            'name'=>'required|string',
//            'description'=>'required|string',
//            'price'=>'required|numeric',
//            'image'=>'required',
//        ]);
//
//        Pizza::create([
//            'name'=>$request->name,
//            'description'=>$request->description,
//            'price'=>$request->price,
//           'image'=>$request->image,
//
//
//
//        ]);
//
//
//        return redirect('');
//    }

    public function add(Request $request){

//        $pizza = new Pizza();
//        $pizza->name =$request->name;
//        $pizza->description =$request->description;
//        $pizza->price =$request->price;
//
//        if ($request->hasFile('image')){
//
//            $file =$request->file('image');
//            $extension = $file->getClientOriginalExtension();
//            $filename=time()."_".$extension;
//            $file->move('/',$filename);
//            $pizza->image=$file;
//        }else {
//            return $request;
//            $pizza->image ='';
//        }
//
//        $pizza->save();



        $file = $request->file('image');

        $nama_file = time()."_".$file->getClientOriginalName();
        $destination = base_path() . '/public/uploads';

        $file->move($destination,$nama_file);

        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $nama_file,
]);

return redirect('');
    }


//    public function update(Request $request,$id){
//        $this->validate($request,[
//            'name'=>'required|string',
//            'description'=>'required|string',
//            'price'=>'required|numeric',
//            'image'=>'required',
//        ]);
//
////       $pizza_id =\request('id');
////
////       Pizza::where('id','=',$pizza_id)->update([
////           'name'=>$request->name,
////           'description'=>$request->description,
////           'price'=>$request->price,
////           'image'=>$request->image,
////       ]);
//
//        $pizza = Pizza::find($request->input('id'));
//        $pizza->name=$request->name;
//        $pizza->description=$request->description;
//        $pizza->price=$request->price;
//        $pizza->image=$request->image;
//        $pizza->save();
//
//
//
//
//
////       return redirect('');
//    }

    public function edit($id)
    {
        //
        $pizza = Pizza::find($id);
        return view('pizupd', compact('pizza', 'id'));
    }
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name'    =>  'required',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'image'=>'required',

        ]);
        $pizza = Pizza::find($id);
        $pizza->name = $request->get('name');
        $pizza->description = $request->get('description');
        $pizza->price =$request->get('price');


        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $file->move($destination,$nama_file);


        $pizza->image =$nama_file;

        $pizza->save();
        return redirect('');
    }



//    public function add(){
//
//         function validator(array $data)
//        {
//            return Validator::make($data, [
//                'name' => ['required', 'string', 'max:255'],
//                'description' => ['required','string','max:255'],
//                'price' => ['required','numeric','min:1'],
//                'image'=>['required','string'],
//            ]);
//        }
//
//         function create(array $data)
//        {
//            return Pizza::create([
//                'name' => $data['name'],
//                'description' => $data['description'],
//                'price' => $data['price'],
//                'image'=> $data['image'],
//            ]);
//        }
//        return
//    }


    public function destroy($id){
        $pizza= Pizza::find($id);
        $pizza->delete();
        return redirect('');
    }


    public function addToCart(Request $request, $id){
        $pizdet = Pizza::where('id', $id)->first();
        $date = Carbon::now();

        $checkCart = Cart::where('user_id', Auth::user()->id)->first();

        if(empty($checkCart)){
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->date = $date;
            $cart->quantity = $request->qty;
            $cart->price = $pizdet->price*$request->qty;
            $cart->save();
        }
        else{
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cart->quantity = $cart->quantity+$request->qty;

            $newCart_price = $pizdet->price*$request->qty;
            $cart->price = $cart->price+$pizdet->price*$request->qty;
            $cart->update();
        }

        $newCart = Cart::where('user_id', Auth::user()->id)->first();

        $checkTransaction = Transaction::where('pizza_id', $pizdet->id)->where('cart_id', $newCart->id)->first();

        if(empty($checkTransaction)){
            $transaction = new Transaction;
            $transaction->pizza_id = $pizdet->id;
            $transaction->cart_id = $newCart->id;
            $transaction->total_qty = $request->qty;
            $transaction->total_price = $pizdet->price*$request->qty;
            $transaction->save();
        }else{
            $transaction = Transaction::where('pizza_id', $pizdet->id)->where('cart_id', $newCart->id)->first();
            $transaction->total_qty = $transaction->total_qty+$request->qty;

            $newTransaction_price = $pizdet->price*$request->qty;
            $transaction->total_price = $transaction->total_price+$newTransaction_price;
            $transaction->update();
        }

        // $cart = Cart::where('user_id', Auth::user()->id)->first();
        // $cart->price = $cart->price+$pizdet->price*$request->qty;
        // $cart->update();

        return redirect('');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $piz = Pizza::where("name", 'like', "%".$search."%")->paginate(6);
        return view('home', compact('piz'));
    }


}
