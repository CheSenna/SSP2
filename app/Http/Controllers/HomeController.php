<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        if($role==1){
            return view('livewire.admin-dashboard');//admin
        }
        elseif($role==2){
            return view('livewire.supplier-dashboard');//supplier
        }
        else{
            $products=Product::all();
            return view('index', compact('products'));//user
        }
        
    }
}
