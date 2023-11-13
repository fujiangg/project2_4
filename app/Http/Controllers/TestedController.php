<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class TestedController extends Controller
{
    public function index()
    {      
        $tesitems = Item::where('configuration_status', 'tested')->simplePaginate(5);

        return view('testeds.index', compact('tesitems'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    /**
     * CREATE
     */
    public function create()
    {
        return view('testeds.add');
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
       
        return redirect()->route('testeds.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('testeds.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        return view('testeds.edit',compact('item'));
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
      
        return redirect()->route('testeds.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(Item $item)
    {
        $item->delete();
       
        return redirect()->route('testeds.index')
                        ->with('success','Item deleted successfully');

    }
}
