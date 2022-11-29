<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('title');

    public function movies(){
        return $this->hasMany('App\Models\Movie');
    }
}
