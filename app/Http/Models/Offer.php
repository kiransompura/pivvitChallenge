<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offering";
    
    public $fillable = ['id', 'title', 'price'];
}
