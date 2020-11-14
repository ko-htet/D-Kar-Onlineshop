<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'photo', 'col1', 'col2'];

    public function items(){
        return $this->hasMany('App\Item');
    }
}
