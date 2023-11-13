<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class UnconfiguredController extends Controller
{
    public function index()
    {      
        $unitems = Item::where('configuration_status', 'unconfigured')->simplePaginate(5);

        return view('unconfigureds.index', compact('unitems'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    /**
     * CREATE
     */
    public function create()
    {
        return view('unconfigureds.add');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'configuration_status' => 'required',
        ]);
      
        Item::create($request->all());
       
        return redirect()->route('unconfigureds.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('unconfigureds.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        return view('unconfigureds.edit',compact('item'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item' => 'required',
            'configuration_status' => 'required',
        ]);
      
        $item->update($request->all());
      
        return redirect()->route('unconfigureds.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(Item $item)
    {
        $item->delete();
       
        return redirect()->route('unconfigureds.index')
                        ->with('success','Item deleted successfully');

    }
}
