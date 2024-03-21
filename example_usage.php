<?php

// Include the PHP file containing the SearchingAlgorithms class
include 'include/searching_algorithms.php';

// Example usage:
// Define an array and a target value for searching
$arr = array(2, 3, 4, 10, 40);
$x = 10;

/** 
 * Perform various searching algorithms on the array
 */

// Perform linear search and display the result
echo "Linear Search: " . SearchingAlgorithms::linearSearch($arr, $x) . "\n";

// Perform binary search and display the result
echo "Binary Search: " . SearchingAlgorithms::binarySearch($arr, $x) . "\n";

// Perform interpolation search and display the result
echo "Interpolation Search: " . SearchingAlgorithms::interpolationSearch($arr, $x) . "\n";

// Perform exponential search and display the result
echo "Exponential Search: " . SearchingAlgorithms::exponentialSearch($arr, $x) . "\n";

// Perform jump search and display the result
echo "Jump Search: " . SearchingAlgorithms::jumpSearch($arr, $x) . "\n";

// Perform ternary search and display the result
echo "Ternary Search: " . SearchingAlgorithms::ternarySearch($arr, 0, count($arr) - 1, $x) . "\n";
