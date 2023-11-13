<?php

namespace App\Http\Controllers;

use App\Models\ConfigurationStatusName;
use App\Models\ItemName;
use App\Models\ManufacturerName;
use Illuminate\Http\Request;

class ItemNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item_names = ItemName::oldest()->simplePaginate(3);
        $manufacturer_names = ManufacturerName::oldest()->simplePaginate(3);
        $configuration_status_names = ConfigurationStatusName::oldest()->simplePaginate(3);

        return view('item-names.index', compact('item_names', 'manufacturer_names', 'configuration_status_names'))
                    ->with('i', (request()->input('page', 1) - 1) * 3);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item-names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ItemName::create($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemName $itemName)
    {
        return view('item-names.show', compact('itemName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemName $itemName)
    {
        return view('item-names.edit', compact('itemName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemName $itemName)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $itemName->update($request->all());

        return redirect()->route('item-names.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemName $itemName)
    {
        $itemName->delete();

        return redirect()->route('item-names.index')
                        ->with('success');
    }
}
