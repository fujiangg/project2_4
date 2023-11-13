<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DetailLogsController extends Controller
{
    public function log(Item $item) {
        return view('items.trash_log', [
            'logs' => Activity::where('subject_type', Item::class)->where('subject_id', $item->id)->latest()->get()
        ]);
    }

}
