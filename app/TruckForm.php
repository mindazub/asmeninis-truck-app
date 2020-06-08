<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckForm extends Model
{
    protected $fillable = [
      'truck_name_id', 'year', 'owner', 'total_owners', 'comments'
    ];

    public function truckName()
    {
        return $this->belongsTo(TruckName::class);
    }
}
