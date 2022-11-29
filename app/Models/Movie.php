<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    public $timestamps = true;
    protected $fillable = array('title','description','rate','image','category_id');

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
