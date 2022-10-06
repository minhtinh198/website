<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_chitiet extends Model
{
    use HasFactory;
    //protected $guarded =[];
    protected $table = 'product_img';
    protected $fillable = [
    	'img_product_img', 'id_product',];
    
}
