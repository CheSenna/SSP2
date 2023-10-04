<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();

        return view('category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->input('category_name');

        $data->save();

        return redirect('view_category')->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect('view_category')->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category=category::all();

        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;

        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        $product->discount_price=$request->input('dis_price');
        $product->category=$request->input('category');

        if ($request->hasFile('image')  && $request->image->isValid()) {
            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imageName);
            $product->image=$imageName;
        }
        $product->image=$imageName;
        
        $product->save();

        return redirect('view_product')->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $product=product::all();

        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect('show_product')->with('message', 'Category Deleted Successfully');
    }

    public function edit_product($id)
    {
        $product=product::find($id);
        $category=category::all();

        return view('admin.edit_product',compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product=product::find($id);

        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        $product->discount_price=$request->input('dis_price');
        $product->category=$request->input('category');

        if ($request->hasFile('image')  && $request->image->isValid()) {
            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imageName);
            $product->image=$imageName;
        }

        $product->save();

        return redirect()->back();
    }
}
