<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::paginate(10);
    return view('admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.categories.form');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $cat = new Category();
    $cat->name = $request->name;
    $cat->save();
    return redirect()->route('admin.categories.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $cat = Category::find($id);
    if (!$cat) {
      abort(404);
    }
    return view('admin.categories.form', compact('cat'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $cat = Category::find($id);
    $cat->name = $request->name;
    $cat->save();
    return redirect()->route('admin.categories.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
