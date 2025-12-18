<?php

namespace App\Models;

use App\Enums\PaymentType;
use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Payment extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'account_owner',
    ];

    protected $hidden = [
        'account_number',
    ];

    public function casts()
    {
        return [
            'type' => PaymentType::class,
        ];
    }

    protected function accountNumber() : Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? Crypt::encrypt($value) : null,
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
