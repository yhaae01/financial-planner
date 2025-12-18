<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'name',
        'percentage',
        'nominal_value',
        'monthly_saving',
        'deadline',
        'beginning_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }
}
