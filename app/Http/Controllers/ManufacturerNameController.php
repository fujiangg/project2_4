<?php

namespace App\Http\Controllers;

use App\Models\ManufacturerName;
use Illuminate\Http\Request;

class ManufacturerNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manufacturer-names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ManufacturerName::create($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ManufacturerName $manufacturerName)
    {
        return view('manufacturer-names.show', compact('manufacturerName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManufacturerName $manufacturerName)
    {
        return view('manufacturer-names.edit', compact('manufacturerName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManufacturerName $manufacturerName)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $manufacturerName->update($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManufacturerName $manufacturerName)
    {
        $manufacturerName->delete();

        return redirect()->route('item-names.index')->with('success');
    }
}
