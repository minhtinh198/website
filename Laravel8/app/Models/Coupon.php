<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
    	'id_coupon', 'coupon_name','coupon_code','coupon_number','lever','coupon_id_customer'];
 	protected $table = 'coupon';
     protected $primaryKey = 'id_coupon';
     public $timestamps = false;
}
