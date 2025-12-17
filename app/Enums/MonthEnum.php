<?php 

namespace App\Enums;

enum MonthEnum: string
{
    case JANUARY = 'Januari';
    case FEBRUARY = 'Februari';
    case MARCH = 'Maret';
    case APRIL = 'April';
    case MAY = 'Mei';
    case JUNE = 'Juni';
    case JULY = 'Juli';
    case AUGUST = 'Agustus';
    case SEPTEMBER = 'September';
    case OCTOBER = 'Oktober';
    case NOVEMBER = 'November';
    case DECEMBER = 'Desember';

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

    public static function getMonthName(int $month): self
    {
        return match ($month) {
            1 => self::JANUARY,
            2 => self::FEBRUARY,
            3 => self::MARCH,
            4 => self::APRIL,
            5 => self::MAY,
            6 => self::JUNE,
            7 => self::JULY,
            8 => self::AUGUST,
            9 => self::SEPTEMBER,
            10 => self::OCTOBER,
            11 => self::NOVEMBER,
            12 => self::DECEMBER,
            default => throw new \InvalidArgumentException("Invalid month: {$month}"),
        };
    }
}