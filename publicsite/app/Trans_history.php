<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans_history extends Model
{
    protected $fillable = [
        'user_id', 'sendername', 'receivername', 'amount', 'country', 'mobile_money_account', 'date', 'time', 'created_at','status',
    ];
}
