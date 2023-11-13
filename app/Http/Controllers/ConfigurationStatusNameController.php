<?php

namespace App\Http\Controllers;

use App\Models\ConfigurationStatusName;
use Illuminate\Http\Request;

class ConfigurationStatusNameController extends Controller
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
        return view('configurationStatus-names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ConfigurationStatusName::create($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ConfigurationStatusName $configurationStatusName)
    {
        return view('configurationStatus-names.show', compact('configurationStatusName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConfigurationStatusName $configurationStatusName)
    {
        return view('configurationStatus-names.edit', compact('configurationStatusName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConfigurationStatusName $configurationStatusName)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $configurationStatusName->update($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConfigurationStatusName $configurationStatusName)
    {
        $configurationStatusName->delete();

        return redirect()->route('item-names.index')->with('success');
    }
}
