<?php 

namespace App\Enums;

enum BudgetType: string
{
    case INCOME = 'Penghasilan';
    case SAVING = 'Tabungan dan Investasi';
    case DEBT = 'Cicilan Hutang';
    case BILL = 'Tagihan';
    case SHOPPING = 'Belanja';

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