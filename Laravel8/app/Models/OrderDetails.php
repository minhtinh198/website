<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
    	'id_details', 'order_code','product_id','product_name','color','size','product_price','product_qty'];
    protected $table ='order_details';
    protected $primaryKey = 'id_details';
}
