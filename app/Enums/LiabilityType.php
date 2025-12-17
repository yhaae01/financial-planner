<?php 

namespace App\Enums;

enum LiabilityType: string
{
    case SHORTTERMDEBT = 'Hutang Jangka Pendek';
    case MIDTERMDEBT = 'Hutang Jangka Menengah';
    case LONGTERMDEBT = 'Hutang Jangka Panjang';

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