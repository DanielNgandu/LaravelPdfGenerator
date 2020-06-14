<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *            $table->string('to');
    $table->string('from');
    $table->string('prepared_by');
    $table->dateTime('validity_period')->nullable();
     * @var array
     */
    protected $fillable = [
        'to', 'from', 'prepared_by','validity_period',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
