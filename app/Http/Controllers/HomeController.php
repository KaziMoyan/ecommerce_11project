<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
class HomeController extends Controller
{
    public function index()
    {
        $user = User:: where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $deliverd= Order::where('status','Deliverd')->get()->count();
        return view('admin.index',compact('user','product','order','deliverd'));
    }
    public function home(){

        $product = Product::all();

        return view('home.index',Compact('product'));
    }
    public function login_home(){
        $product = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart:: where('user_id',$userid)->count();
        }
        else{
            $count='';
        }
        
        return view('home.index',compact('product','count'));

    }
    public function product_details($id){

        $data =Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart:: where('user_id',$userid)->count();
        }
        else{
            $count='';
        }


        return view('home.product_details',compact('data','count'));

    }
  public function add_cart($id){
    $product_id = $id;
    $user = Auth::user();
    $user_id = $user->id;
    $data = new Cart;
    $data->user_id =$user_id;
    $data->product_id =$product_id;
    $data->save();
    toastr()->timeOut(1000)->closeButton()->addSuccess('category added successfullu');
    return redirect()->back();
   
  }
  public function mycart(){
    if(Auth::id()){

        $user = Auth::user();
        $userid = $user->id;
        $count =Cart::where('user_id',$userid)->count();

        $cart =Cart::where('user_id',$userid)->get();



    }
    return view('home.mycart',compact('count','cart'));
  }

  public function delete_cart($id){

    $data = Cart::find($id);

    $data->delete();

    toastr()->timeOut(10000)->closeButton()->addSuccess('Product Removed Successfully');

    return redirect()->back();

}
public function confirm_order(Request $request)
{
    $user = Auth::user();
    $cart = Cart::where('user_id', $user->id)->get();

    if ($cart->isEmpty()) {
        toastr()->error('Your cart is empty.');
        return redirect()->back();
    }

    foreach ($cart as $carts) {
        $order = new Order;
        $order->name = $request->name;
        $order->rec_address = $request->address;
        $order->phone = $request->phone;
        $order->user_id = $user->id;
        $order->product_id = $carts->product_id;
        $order->save();
    }

    Cart::where('user_id', $user->id)->delete();

    toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully');

    return redirect()->back();
}
public function myorders(){
    $user = Auth::user()->id;
    $count = Cart:: where('user_id',$user)->get()->count();
    $order =Order:: where('user_id',$user)->get();
    return view('home.order',compact('count','order'));
}
public function shop()
{
    $product = Product::all();

    if(Auth::id()){
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart:: where('user_id',$userid)->count();
    }
    else{
        $count='';
    } 
    return view('home.shop',compact('product','count'));

}
public function about()
{
    
    if(Auth::id()){
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart:: where('user_id',$userid)->count();
    }
    else{
        $count='';
    }
    return view('home.about',compact('count'));

}
public function testimonial()
{
    
    if(Auth::id()){
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart:: where('user_id',$userid)->count();
    }
    else{
        $count='';
    }
    return view('home.testimonial',compact('count'));

}

public function contact()
{
    $count = 0; // Default value for the cart count

    if (Auth::check()) { // Use Auth::check() to verify authentication
        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->count();
    }
    return view('home.contact', compact('count'));
}
}
