<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'categorie' => 'required'
        ]);
        $categorie = new Categorie();
        $categorie->name = $request->categorie;
        $categorie->save();
        return redirect('/categories');
    }

    public function update(Request $request)
    {
        $request->validate([
            'categorie' => 'required'
        ]);
        $categorie = Categorie::findOrFail($request->id);
        $categorie->name = $request->categorie;
        $categorie->update();
        return redirect('/categories');
    }

    public function delete(Request $request)
    {
        $categorie = Categorie::findOrFail($request->id);
        $categorie->delete();
        return redirect('/categories');
    }
}
