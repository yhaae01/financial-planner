<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class NetWorthLiability extends Model
{
    use HasUuids;

    protected $fillable = [
        'liability_id',
        'transaction_date',
        'nominal',
    ];

    public function liability()
    {
        return $this->belongsTo(Liability::class);
    }
}
