<?php 

namespace App\Enums;

enum AssetType: string
{
    case CASH = 'Kas';
    case PERSONAL = 'Personal';
    case SHORTTERM = 'Investasi Jangka Pendek';
    case MIDTERM = 'Investasi Jangka Sedang';
    case LONGTERM = 'Investasi Jangka Panjang';

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