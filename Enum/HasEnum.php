<?php

namespace Traits\Enum;

trait HasEnum
{

    private static function undefined(): static
    {
        return constant(static::class . '::UNDEFINED');
    }

    public static function options(...$ignore): array
    {
        return array_column(self::stakes(), 'value', 'name');
    }

    public static function stakes(...$ignore): array
    {
        $ignore = array_merge($ignore, [self::undefined()]);
        return self::enums(...$ignore);
    }

    public static function main(...$ignore): array
    {
        $ignore = array_merge($ignore, [self::undefined()]);
        return self::enums(...$ignore);
    }

    public static function match(mixed $match, mixed $default = null): mixed
    {
        $cases = self::cases();
        $matchs = array_filter($cases, fn($e)
        => in_array($match, [$e,  $e->name, $e->value], true));

        return $matchs[array_key_first($matchs)] ?? $default;
    }

    public static function filter(...$find)
    {
        $enums = array_filter(self::cases(), fn($e) => in_array($e, $find));
        $labels = array_map(fn($e) => $e?->label(), $enums);
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $labels);
    }

    public static function enums(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $enums);
    }

    public static function labels(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $labels = array_map(fn($e) => $e?->label(), $enums);
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $labels);
    }

    public static function names(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $names = array_column($enums, 'name');
        $values = array_column($enums, 'value');

        return array_combine($values, $names);
    }

    public static function values(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $names = array_column($enums, 'name');
        $values = array_column($enums, 'value');

        return array_combine($names, $values);
    }
}
