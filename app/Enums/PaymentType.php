<?php 

namespace App\Enums;

enum PaymentType: string
{
    CASE CASH = 'Kas';
    CASE DEBIT = 'Debit';
    CASE CREDIT = 'Kredit';
    CASE EWALLET = 'E-Wallet';

    public static function options(array $exclude = []): array
    {
        return collect(self::cases())
            ->filter(fn($type) => !in_array($type->name, $exclude))
            ->map(fn (self $type) => [
                'label' => $type->value,
                'value' => $type->name,
            ])
            ->values()
            ->toArray();
    }
}