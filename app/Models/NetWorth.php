<?php

namespace App\Models;

use App\Enums\MonthEnum;
use App\Enums\BudgetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class NetWorth extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'net_worth_goal',
        'current_net_worth',
        'amount_left',
        'transaction_per_month',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
