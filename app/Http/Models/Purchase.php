<?php
namespace App\Http\Models;
//namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchase";
    
    public $fillable = ['offering_id', 'quantity', 'customer_name'];
}
