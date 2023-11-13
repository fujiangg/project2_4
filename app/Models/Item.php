<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, LogsActivity, Userstamps, SoftDeletes;

    protected $table = 'items';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    protected $fillable = [
        'itemName_id', 
        'manufacturerName_id', 
        'serial_number', 
        'configurationStatusName_id',
        'location',
        'description', 
    ];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly([
                    'itemName_id', 
                    'manufacturerName_id', 
                    'serial_number', 
                    'configurationStatusName_id',
                    'location',
                    'description',
                    'created_at',
                    'updated_at'
                ]) 
                ->setDescriptionForEvent(fn(string $eventName) => "This item has been {$eventName}")
                ->useLogName('Post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemName()
    {
        return $this->belongsTo(ItemName::class, 'itemName_id');
    }

    public function manufacturerName()
    {
        return $this->belongsTo(ManufacturerName::class, 'manufacturerName_id');
    }

    public function configurationStatusName()
    {
        return $this->belongsTo(ConfigurationStatusName::class, 'configurationStatusName_id');
    }

}
