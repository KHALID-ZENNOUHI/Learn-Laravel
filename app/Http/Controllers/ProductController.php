<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table('products')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as productCategorie')
            ->get();
        $categories = Categorie::all();
        return view('client.home', compact('products', 'categories'));
    }

    public function show() {
        $products = DB::table('products')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as productCategorie')
            ->get();
        $categories = Categorie::all();
        return view('admin.products', compact('products', 'categories'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'description'  => 'required',
            'price'  => 'required',
            'categorie'  => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg'
        ]);
        $uploadFileName = uniqid() . '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('images/', $uploadFileName);
        $product = new Product();
        $product->name = $request->product;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categorie_id = $request->categorie;
        $product->image = $uploadFileName;
        $product->save();
        return redirect('/products');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'categorie' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg'
        ]);

        $product = Product::findOrFail($request->id);

        if ($request->hasFile("image")) {
            $hasImage = public_path('images/' . $product->image);
            if (file_exists($hasImage)) {
                unlink($hasImage);
            }
            $uploadFileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images/', $uploadFileName);
            $product->image = $uploadFileName;
        }
        $product->name = $request->product;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categorie_id = $request->categorie;
        $product->update();
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect('/products');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('client.home', compact('products'));
    }

    public function filter(Request $request)
    {
        $filter = $request->categorie;

        $products = Product::whereHas('category', function ($query) use ($filter) {
            $query->where('name', $filter);
        })->get();
        return view('client.home', compact('products'));
        // Now $products contains only products that have a related category with the specified name.
    }
}


