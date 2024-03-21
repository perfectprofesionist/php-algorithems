# Searching Algorithms in PHP

This repository contains PHP code implementing various searching algorithms, including linear search, binary search, interpolation search, exponential search, jump search, and ternary search.

## Overview

Searching algorithms are used to locate a specific item or element within a data structure, such as an array. These algorithms are crucial in computer science and are used in many applications, including database queries, web searches, and more.

In this repository, we provide PHP implementations of several commonly used searching algorithms. Each algorithm is implemented as a static method within the `SearchingAlgorithms` class.

## Files

- `searching_algorithms.php`: Contains the implementation of searching algorithms.
- `example_usage.php`: Demonstrates the usage of the searching algorithms with example arrays and target values.

## Usage

To use the searching algorithms in your PHP project:

1. Include the `searching_algorithms.php` file in your PHP script:

    ```php
    include 'include/searching_algorithms.php';
    ```

2. You can then use the static methods of the `SearchingAlgorithms` class to perform various searches:

    ```php
    $arr = array(2, 3, 4, 10, 40);
    $x = 10;

    // Example usage
    echo "Linear Search: " . SearchingAlgorithms::linearSearch($arr, $x) . "\n";
    echo "Binary Search: " . SearchingAlgorithms::binarySearch($arr, $x) . "\n";
    echo "Interpolation Search: " . SearchingAlgorithms::interpolationSearch($arr, $x) . "\n";
    echo "Exponential Search: " . SearchingAlgorithms::exponentialSearch($arr, $x) . "\n";
    echo "Jump Search: " . SearchingAlgorithms::jumpSearch($arr, $x) . "\n";
    echo "Ternary Search: " . SearchingAlgorithms::ternarySearch($arr, 0, count($arr) - 1, $x) . "\n";
    
    ```

3. Replace `$arr` with your array and `$x` with your target value. You can perform different searches based on your requirements.

## Contributing

Contributions to improve the code or add new searching algorithms are welcome! Feel free to open a pull request or submit an issue if you have any suggestions or feedback.

