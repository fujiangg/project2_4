<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class InstalledController extends Controller
{
    public function index()
    {      
        $installeditems = Item::where('configuration_status', 'installed')->simplePaginate(5);

        return view('installeds.index', compact('installeditems'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    /**
     * CREATE
     */
    public function create()
    {
        return view('installeds.add');
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
       
        return redirect()->route('installeds.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('installeds.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        return view('installeds.edit',compact('item'));
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
      
        return redirect()->route('installeds.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(Item $item)
    {
        $item->delete();
       
        return redirect()->route('installeds.index')
                        ->with('success','Item deleted successfully');

    }
}
