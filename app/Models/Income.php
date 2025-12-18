<?php

namespace App\Models;

use App\Enums\MonthEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'source_id',
        'date',
        'nominal',
        'notes',
        'month',
        'year',
    ];

    protected function casts(): array
    {
        return [
            'month' => MonthEnum::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function source()
    {
        return $this->belongsTo(Budget::class, 'source_id', 'id');
    }
}
