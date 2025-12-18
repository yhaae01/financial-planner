<?php

namespace App\Models;

use App\Enums\LiabilityType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'net_worth_id',
        'detail',
        'goal',
        'type',
    ];

    protected function casts()
    {
        return [
            'type' => LiabilityType::class,
        ];
    }
}
