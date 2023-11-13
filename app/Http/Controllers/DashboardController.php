<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

    /**
     * INDEX
     */
    public function index()
    {      
        $allitems = Item::count();
        $unconfigured = Item::where('configurationStatusName_id', '1')->count();
        $preconfigured = Item::where('configurationStatusName_id', '2')->count();
        $configured = Item::where('configurationStatusName_id', '3')->count();
        $tested = Item::where('configurationStatusName_id', '4')->count();
        $installed = Item::where('configurationStatusName_id', '5')->count();
        $items = Item::latest()->simplePaginate(5);

        return view('dashboards.index', compact('allitems', 'unconfigured', 'preconfigured', 'configured', 'tested', 'installed', 'items'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);;
    } 

}