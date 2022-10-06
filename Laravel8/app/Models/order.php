<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
    	'id_order', 'name','Email','Phone','Tinh_thanh','dia_chi','order_code','total','lever','id_customer'];
 	protected $table = 'orders';
     protected $primaryKey = 'id_order';
}
