# Status Enum Documentation

This document describes the `Status` enum and its utility methods provided by the `HasEnum` trait.

---

## Introduction

Modern systems are dynamic and constantly evolving. To maintain consistency and avoid errors when dealing with fixed sets of values, enums provide a structured way to define valid options.  

The `HasEnum` trait adds a suite of utility methods that make enums **more flexible and easier to use** across different parts of an application. These methods allow you to:

- Retrieve options for dropdowns or configuration arrays.
- Filter or match enum cases dynamically.
- Map values to human-readable labels or names.
- Ignore undefined or unused values in calculations or displays.

To enforce consistency, any enum that uses this trait **must define a `UNDEFINED` case** as the default fallback value. This ensures that every operation has a safe default to rely on, preventing unexpected errors when a value is missing, invalid, or not yet defined.

By using this trait, developers gain a **standardized, reusable interface** for working with enums, reducing boilerplate code and making systems more maintainable.

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

### `associative()`
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
