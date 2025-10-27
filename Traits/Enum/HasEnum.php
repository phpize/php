<?php

namespace Phpize\Php\Traits\Enum;

trait HasEnum
{
    /**
     * Returns the "UNDEFINED" constant of the enum.
     *
     * @return static
     */
    private static function undefined(): static
    {
        return constant(static::class . '::UNDEFINED');
    }

    /**
     * Returns an associative array of enum options with
     * enum names as keys and values as values.
     *
     * @return array
     */
    public static function associative(): array
    {
        return array_column(self::stakes(), 'value', 'name');
    }

    /**
     * Returns an array of enum instances excluding the "UNDEFINED" value
     * and optionally other values passed in $ignore.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function stakes(...$ignore): array
    {
        $ignore = array_merge($ignore, [self::undefined()]);
        return self::enums(...$ignore);
    }

    /**
     * Alias for stakes(): returns main enum cases excluding "UNDEFINED" and any ignored values.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function main(...$ignore): array
    {
        $ignore = array_merge($ignore, [self::undefined()]);
        return self::enums(...$ignore);
    }

    /**
     * Attempts to match a value, name, or enum instance to an enum case.
     * Returns the first match or the default value if no match is found.
     *
     * @param mixed $match
     * @param mixed $default
     * @return mixed
     */
    public static function match(mixed $match, mixed $default = null): mixed
    {
        $cases = self::cases();
        $matchs = array_filter($cases, fn($e)
        => in_array($match, [$e,  $e->name, $e->value], true));

        return $matchs[array_key_first($matchs)] ?? $default;
    }

    /**
     * Filters enum cases by the given enum instances and returns
     * an associative array of values and their labels.
     *
     * @param mixed ...$find
     * @return array
     */
    public static function filter(...$find)
    {
        $enums = array_filter(self::cases(), fn($e) => in_array($e, $find));
        $labels = array_map(fn($e) => $e?->label(), $enums);
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $labels);
    }

    /**
     * Returns all enum cases excluding any ignored values.
     * The result is an associative array with enum values as keys and enum instances as values.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function enums(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $enums);
    }

    /**
     * Returns an associative array of enum values and labels,
     * excluding any ignored values.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function labels(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $labels = array_map(fn($e) => $e?->label(), $enums);
        $values = array_map(fn($e) => $e->value, $enums);

        return array_combine($values, $labels);
    }

    /**
     * Returns an associative array of enum values and names,
     * excluding any ignored values.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function names(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $names = array_column($enums, 'name');
        $values = array_column($enums, 'value');

        return array_combine($values, $names);
    }

    /**
     * Returns an associative array of enum names and values,
     * excluding any ignored values.
     *
     * @param mixed ...$ignore
     * @return array
     */
    public static function values(...$ignore): array
    {
        $enums = array_filter(self::cases(), fn($e) => empty(in_array($e, $ignore)));
        $names = array_column($enums, 'name');
        $values = array_column($enums, 'value');

        return array_combine($names, $values);
    }
}
