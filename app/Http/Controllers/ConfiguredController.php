<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ConfiguredController extends Controller
{
    public function index()
    {      
        $conitems = Item::where('configuration_status', 'configured')->simplePaginate(5);

        return view('configureds.index', compact('conitems'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    /**
     * CREATE
     */
    public function create()
    {
        return view('configureds.add');
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
       
        return redirect()->route('configureds.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('configureds.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        return view('configureds.edit',compact('item'));
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
      
        return redirect()->route('configureds.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(Item $item)
    {
        $item->delete();
       
        return redirect()->route('configureds.index')
                        ->with('success','Item deleted successfully');

    }
}
