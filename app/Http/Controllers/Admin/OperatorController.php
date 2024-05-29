<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operators = Operator::paginate(10);
        return view('admin.operators.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.operators.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $operator = new Operator();
        $operator->first_name = $request->first_name;
        $operator->save();
        return redirect()->route('admin.operators.index');
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
        $operator = Operator::find($id);
        if (!$operator) {
          abort(404);
    }
    return view('admin.operators.form', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $operator = Operator::find($id);
      if (!$operator) {
        abort(404);
      }
      $operator->first_name = $request->first_name;
      $operator->save();
      return redirect()->route('admin.operators.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operator = Operator::find($id);
        if (!$operator) {
          abort(404);
        }
        $operator->delete();
        return redirect()->route('admin.operators.index');
      }
}
