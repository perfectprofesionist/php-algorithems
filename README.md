## Sorting and Searching Algorithms in PHP

This repository contains implementations of various sorting and searching algorithms in PHP.

### Sorting Algorithms

- **Bubble Sort**: `bubbleSort($array)`
- **Selection Sort**: `selectionSort($array)`
- **Insertion Sort**: `insertionSort($array)`
- **Merge Sort**: `mergeSort($array)`
- **Quick Sort**: `quickSort($array)`
- **Heap Sort**: `heapSort($array)`
- **Shell Sort**: `shellSort($array)`
- **Radix Sort**: `radixSort($array)`
- **Counting Sort**: `countingSort($array)`
- **Bucket Sort**: `bucketSort($array)`
- **Cocktail Shaker Sort**: `cocktailShakerSort($array)`
- **Comb Sort**: `combSort($array)`
- **Gnome Sort**: `gnomeSort($array)`
- **Cycle Sort**: `cycleSort($array)`
- **Pancake Sort**: `pancakeSort($array)`
- **Bogosort**: `bogoSort($array)`
- **Stooge Sort**: `stoogeSort($array)`
- **Bead Sort**: `beadSort($array)`
- **Sleep Sort**: `sleepSort($array)`

### Searching Algorithms

- **Linear Search**: `linearSearch($arr, $x)`
- **Binary Search**: `binarySearch($arr, $x)`
- **Interpolation Search**: `interpolationSearch($arr, $x)`
- **Exponential Search**: `exponentialSearch($arr, $x)`
- **Jump Search**: `jumpSearch($arr, $x)`
- **Ternary Search**: `ternarySearch($arr, $l, $r, $x)`

### Usage

```php
<?php

// Include the PHP file containing the SortingAlgorithms and SearchingAlgorithms classes
include 'include/searching_algorithms.php';
include 'include/sorting_algorithms.php';

// Define an array and a target value for searching
$arr = array(2, 3, 4, 10, 40);
$x = 10;

// Perform various searching algorithms on the array
echo "Linear Search: " . SearchingAlgorithms::linearSearch($arr, $x) . "\n";
echo "Binary Search: " . SearchingAlgorithms::binarySearch($arr, $x) . "\n";
echo "Interpolation Search: " . SearchingAlgorithms::interpolationSearch($arr, $x) . "\n";
echo "Exponential Search: " . SearchingAlgorithms::exponentialSearch($arr, $x) . "\n";
echo "Jump Search: " . SearchingAlgorithms::jumpSearch($arr, $x) . "\n";
echo "Ternary Search: " . SearchingAlgorithms::ternarySearch($arr, 0, count($arr) - 1, $x) . "\n";

// Define an array for sorting
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);

// Perform various sorting algorithms on the array
echo "Bubble Sort: " . implode(", ", SortingAlgorithms::bubbleSort($arr)) . "\n";
echo "Selection Sort: " . implode(", ", SortingAlgorithms::selectionSort($arr)) . "\n";
echo "Insertion Sort: " . implode(", ", SortingAlgorithms::insertionSort($arr)) . "\n";
echo "Merge Sort: " . implode(", ", SortingAlgorithms::mergeSort($arr)) . "\n";
echo "Quick Sort: " . implode(", ", SortingAlgorithms::quickSort($arr)) . "\n";
echo "Heap Sort: " . implode(", ", SortingAlgorithms::heapSort($arr)) . "\n";
echo "Shell Sort: " . implode(", ", SortingAlgorithms::shellSort($arr)) . "\n";
echo "Radix Sort: " . implode(", ", SortingAlgorithms::radixSort($arr)) . "\n";
echo "Counting Sort: " . implode(", ", SortingAlgorithms::countingSort($arr)) . "\n";
echo "Bucket Sort: " . implode(", ", SortingAlgorithms::bucketSort($arr)) . "\n";
echo "Cocktail Shaker Sort: " . implode(", ", SortingAlgorithms::cocktailShakerSort($arr)) . "\n";
echo "Comb Sort: " . implode(", ", SortingAlgorithms::combSort($arr)) . "\n";
echo "Gnome Sort: " . implode(", ", SortingAlgorithms::gnomeSort($arr)) . "\n";
echo "Cycle Sort: " . implode(", ", SortingAlgorithms::cycleSort($arr)) . "\n";
echo "Pancake Sort: " . implode(", ", SortingAlgorithms::pancakeSort($arr)) . "\n";
echo "Bogosort: " . implode(", ", SortingAlgorithms::bogoSort($arr)) . "\n";
echo "Stooge Sort: " . implode(", ", SortingAlgorithms::stoogeSort($arr)) . "\n";
echo "Bead Sort: " . implode(", ", SortingAlgorithms::beadSort($arr)) . "\n";
echo "Sleep Sort: " . implode(", ", SortingAlgorithms::sleepSort($arr)) . "\n";
?>
```

### Contributing

Contributions are welcome! If you'd like to contribute to this repository, please fork the project, make your changes, and submit a pull request.

