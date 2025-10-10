<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function index(){
        $supports = Support::all();
        return view('support.index', compact('supports'));
    }

    public function create(){
        return view('support.create');
    }

    public function store(Request $request){
        $request->validate([
            'service' => 'required|string|max:255|unique:supports,service',
            'description' => 'required|string',
        ]);

        Support::create([
            'service' => $request->service,
            'description' => $request->description,
        ]);

        return redirect()->route('support.index')->with('success','Service added successfully');
    }

    public function show(Support $support){
        return view('support.show', compact('support'));
    }

    public function edit(Support $support){
        return view('support.edit', compact('support'));
    }

    public function update(Request $request, Support $support){
        $request->validate([
            'service' => 'required|string|max:255|unique:supports,service,'.$support->id,
            'description' => 'required|string',
        ]);

        $support->update([
            'service' => $request->service,
            'description' => $request->description,
        ]);

        return redirect()->route('support.index')->with('success','Service updated successfully');
    }

    public function destroy(Support $support){
        $support->delete();
        return redirect()->route('support.index')->with('success','Service deleted successfully');
    }
}