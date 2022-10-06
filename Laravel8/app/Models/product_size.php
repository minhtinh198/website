<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';
    protected $fillable = [
    	'id_product','id_size'];
}
