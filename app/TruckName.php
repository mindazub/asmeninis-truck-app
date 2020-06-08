<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckName extends Model
{
    protected $fillable = [
      'name'
    ];

    public function truckForm()
    {
        return $this->hasMany(TruckForm::class);
    }
}
