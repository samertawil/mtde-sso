<?php

namespace mtde\sso\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='accounts';

    protected $fillable = [
        'name',
        'idc',
        'user_name',
        'full_name',
        'mobile',
        'email',
        'password',
    ];

    public   function citizendata()
    {
        return $this->hasOne(citizen::class, 'idc', 'idc');
    }

    
}
