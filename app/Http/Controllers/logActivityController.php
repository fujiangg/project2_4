<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Models\Activity;

class logActivityController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->get();
        $items = Item::onlyTrashed()->paginate(10);
        // $logactivities = LogActivity::oldest()->simplePaginate(5);
        $logactivities = LogActivity::with('users')->orderBy('id', 'DESC')->simplePaginate(5);

            return view('logs.index',compact('logactivities', 'users', 'items'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('items.add');
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
      
        LogActivity::create($request->all());
       
        return redirect()->route('items.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(LogActivity $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * EDIT
     */
    public function edit(LogActivity $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, LogActivity $item)
    {
        $request->validate([
            'item' => 'required',
            'configuration_status' => 'required',
        ]);
      
        $item->update($request->all());
      
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(LogActivity $item)
    {
        $item->delete();
       
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');

    }

    public function log(LogActivity $logactivity) {
        return view('logs.index', [
            'logs' => Activity::where('subject_type', LogActivity::class)->where('subject_id', $logactivity->id)->latest()->get()
        ]); 
    }
}
