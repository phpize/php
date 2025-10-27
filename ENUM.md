# Status Enum Documentation

This document describes the `Status` enum and its utility methods provided by the `HasEnum` trait.

---

## Enum Cases

- UNDEFINED (0) – Represents an undefined or unknown status.  
- PENDING (1) – Status for pending actions or items.  
- ACTIVE (2) – Status for active items.  
- INACTIVE (3) – Status for inactive items.  
- SUSPENDED (4) – Status for suspended items.  
- DELETED (5) – Status for deleted items.

---

## Methods Overview

### `options()`
Returns an associative array of enum names as keys and enum values as values. Useful for generating dropdowns or key-value lists.

### `stakes(...$ignore)`
Returns the main enum cases excluding `UNDEFINED` and any additional values passed to ignore. Used to retrieve only active/usable statuses.

### `main(...$ignore)`
Alias for `stakes()`. Provides the same functionality of filtering out `UNDEFINED` and ignored values.

### `match($match, $default = null)`
Finds and returns an enum case by matching against its value, name, or instance. Returns the default if no match is found. Useful for flexible lookups.

### `filter(...$find)`
Filters enum cases based on the given list of enum instances and returns an associative array of values and their labels. Useful for partial selection.

### `enums(...$ignore)`
Returns all enum cases as an associative array `[value => enum instance]`, optionally ignoring specified values. Provides direct access to enum instances by value.

### `labels(...$ignore)`
Returns an associative array `[value => label]` mapping enum values to human-readable labels, optionally ignoring specified values. Useful for displaying statuses to users.

### `names(...$ignore)`
Returns an associative array `[value => name]` mapping enum values to their constant names, optionally ignoring specified values. Useful for debugging or internal references.

### `values(...$ignore)`
Returns an associative array `[name => value]` mapping enum constant names to their values, optionally ignoring specified values. Useful for form options or configuration mappings.
