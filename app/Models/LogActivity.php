<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogActivity extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'activity_log';

    public function users()
    {
        return $this->belongsTo(User::class, 'causer_id');
    } 
}
