<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyConfiguration extends Model
{
    //
    /**
     * @var array
     */
    protected $fillable = [
        'id','user_id', 'company_name','company_tpin','company_website',
        'company_physical_address',
        'company_postal_address','company_phone',
        'company_email','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
