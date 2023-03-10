<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    

    protected $table = 'sliders';




    protected $fillable = ['title'];



    public function slides()
    {
        return $this->hasMany(Slide::class,'slider_id','id');
    }

}
