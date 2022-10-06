<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'name_Customer', 'Email_Customer', 'phone_Customer','password_Customer','lever','token',
    ];
    protected $primarykey = 'id_Customer';

    public function getAuthPassword()
    {
        return $this->password_Customer;
    }
}
