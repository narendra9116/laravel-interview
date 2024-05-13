<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register_form()
    {
        return view('register');
    }

    public function register_insert(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->mobile = $request->input('mobile');
        $user->save();

        return redirect()->route('login_form');
        
    }


    public function login_form()
    {
        return view('login');
    }

    public function login_check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       if (Auth::attempt($credentials)) {
         return redirect()->route('product_form');
    }
         return redirect()->route('login_form');

    }

    public function product_form()
    {
        return view('product');
    }

    public function product_insert(Request $request)
    {
        $product = new Product;

        if ($request->file('image') != '') {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('product-images'), $imageName);
        }

        $vehicleString = implode(",", $request->input('checkbox'));

        $product->title = $request->input('title');
        $product->size = $request->input('size');
        $product->gender = $request->input('gender');
        $product->checkbox = $vehicleString;
        $product->image = $imageName;
        $product->save();

        return redirect()->route('show_product');

        
    }

    public function show_product(){

        $product = Product::all();
        // return view('show_product', [
        //     'product' => $product,
        //     'checkbox' => explode(',', $product->checkbox)
        // ]);
         return view('show_product', compact('product'));
    }

    public function product_edit($id=''){

        $product = Product::where('id', $id) ->first();

        return view('edit_product', [
            'product' => $product,
            'checkbox' => explode(',', $product->checkbox)
        ]);
        
    }

    public function product_update(Request $request, $id)
    {
        $product = Product::find($id);

        // if ($request->file('image') != '') {
        //     $imageName = time().'.'.$request->image->extension();  
        //     $request->image->move(public_path('product-images'), $imageName);
        // }

       if ($request->file('image') != '') {
            $imageName = rand().'.'.$request->image->extension();  
            $request->image->move(public_path('product-images'), $imageName);
       } else {
            $imageName = $request->old_img ;
       }
       
        $vehicleString = implode(",", $request->input('checkbox'));

        $product->title = $request->input('title');
        $product->size = $request->input('size');
        $product->gender = $request->input('gender');
        $product->checkbox = $vehicleString;
        $product->image = $imageName;
        $pro = $product->update();

        if($pro){
            return redirect()->route('show_product');
        }
        
    }

    public function product_delete($id='')
    {
        $deleted = Product::where('id',$id)->delete();
        if($deleted){
            return redirect()->back();
        }
    }


}
