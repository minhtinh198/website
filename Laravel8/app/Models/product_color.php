<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_color extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = [
    	'id_product','id_color'];

    
    
}
