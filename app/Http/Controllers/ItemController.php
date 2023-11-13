<?php

namespace App\Http\Controllers;

use App\Models\ConfigurationStatusName;
use App\Models\Item;
use App\Models\ItemName;
use App\Models\ManufacturerName;
use Illuminate\Http\Request;
use \Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class ItemController extends Controller
{

    /**
     * INDEX
     */
    public function index()
    {
        $items = Item::oldest()->simplePaginate(2);
      
        return view('items.index',compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * CREATE
     */
    public function create()
    {
        $item_names = ItemName::all();
        $manufacturer_names = ManufacturerName::all();
        $configuration_status_names = ConfigurationStatusName::all();
        return view('items.add', compact('item_names', 'manufacturer_names', 'configuration_status_names'));
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'itemName_id' => 'required|exists:item_names,id',
            'configurationStatusName_id' => 'required|exists:configuration_status_names,id',
        ]);
      
        Item::create($request->all());
       
        return redirect()->route('items.index')
                        ->with('success','Item added successfully.');
    }

    /**
     * SHOW
     */
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(Item $item)
    {
        $item_names = ItemName::all();
        $manufacturer_names = ManufacturerName::all();
        $configuration_status_names = ConfigurationStatusName::all();
        return view('items.edit',compact('item', 'item_names', 'manufacturer_names', 'configuration_status_names'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'itemName_id' => 'required|exists:item_names,id',
            'configurationStatusName_id' => 'required|exists:configuration_status_names,id',
        ]);
      
        $item->update($request->all());
      
        return redirect()->route('items.index')
                        ->with('success','Item edited successfully');
    }

    /**
     * DESTROY
     */
    public function destroy($id)
    {
        $item= Item::findOrFail($id);
        $item->delete();
       
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');

    }

    public function trash()
    {
        $item = Item::onlyTrashed()->paginate(2);
        return view('items.trash', ['item' => $item])
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    public function restore($id)
    {
        $item = Item::withTrashed()->findOrFail($id);
        if($item->trashed()){
            
            $item->restore();
            
            return redirect()->route('items.index')->with('status', 'Item successfully restored');
        
        } else {
        
            return redirect()->route('items.index')->with('status', 'Item is not in trash');
        }
       
    } 

    public function log(Item $item) {
        return view('items.log', [
            'logs' => Activity::where('subject_type', Item::class)->where('subject_id', $item->id)->latest()->get()
        ]);
    }
}
