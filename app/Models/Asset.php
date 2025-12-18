<?php

namespace App\Models;

use App\Enums\AssetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Asset extends Model
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
            'type' => AssetType::class,
        ];
    }

    public function netWorth()
    {
        return $this->belongsTo(NetWorth::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
