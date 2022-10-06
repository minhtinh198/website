<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name_product', 'price','mota_product','img_product','id_category','id_brand','status','qty'];
 	protected $table = 'products';
     protected $primaryKey = 'id_product';

     //lấy dữ liệu từ bản category
     public function category(){

         return $this->belongsTo(Category::class, 'id_category');
     }
     //lấy dữ liệu từ bản brand
     public function brand(){

        return $this->belongsTo(brand::class, 'id_brand');
    }
        //lay du lieu từ bản product_chitiet
    public function Product_chitiet()
    {
        return $this->hasMany(product_chitiet::class, 'id_product');
    }

    public function color()
    {
        return $this->hasMany(Color::class, 'id_color');
    }

    
}
