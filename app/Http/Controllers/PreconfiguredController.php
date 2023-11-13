<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PreconfiguredController extends Controller
{
    public function index()
    {      
        $preitems = Item::where('configuration_status', 'preconfigured')->simplePaginate(5);

        return view('preconfigureds.index', compact('preitems'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    /**
     * CREATE
     */
    public function create()
    {
        return view('preconfigureds.add');
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
       
        return redirect()->route('preconfigureds.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('preconfigureds.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        return view('preconfigureds.edit',compact('item'));
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
      
        return redirect()->route('preconfigureds.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(Item $item)
    {
        $item->delete();
       
        return redirect()->route('preconfigureds.index')
                        ->with('success','Item deleted successfully');

    }
}
