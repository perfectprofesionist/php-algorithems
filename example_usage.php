<?php

// Include the PHP file containing the SearchingAlgorithms class
include 'include/searching_algorithms.php';
include 'include/sorting_algorithms.php';
include 'include/graph.php';

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


$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Bubble Sort: " . implode(", ", SortingAlgorithms::bubbleSort($arr)) . "\n";
echo "Selection Sort: " . implode(", ", SortingAlgorithms::selectionSort($arr)) . "\n";
echo "Insertion Sort: " . implode(", ", SortingAlgorithms::insertionSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Merge Sort: " . implode(", ", SortingAlgorithms::mergeSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Quick Sort: " . implode(", ", SortingAlgorithms::quickSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Heap Sort: " . implode(", ", SortingAlgorithms::heapSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Shell Sort: " . implode(", ", SortingAlgorithms::shellSort($arr)) . "\n";


// Example usage:
$arr = array(170, 45, 75, 90, 802, 24, 2, 66);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Radix Sort: " . implode(", ", SortingAlgorithms::radixSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Counting Sort: " . implode(", ", SortingAlgorithms::countingSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Bucket Sort: " . implode(", ", SortingAlgorithms::bucketSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Cocktail Shaker Sort: " . implode(", ", SortingAlgorithms::cocktailShakerSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Comb Sort: " . implode(", ", SortingAlgorithms::combSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Gnome Sort: " . implode(", ", SortingAlgorithms::gnomeSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Cycle Sort: " . implode(", ", SortingAlgorithms::cycleSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Pancake Sort: " . implode(", ", SortingAlgorithms::pancakeSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Bogosort: " . implode(", ", SortingAlgorithms::bogoSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Stooge Sort: " . implode(", ", SortingAlgorithms::stoogeSort($arr)) . "\n";

// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Bead Sort: " . implode(", ", SortingAlgorithms::beadSort($arr)) . "\n";


// Example usage:
$arr = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "Original Array: " . implode(", ", $arr) . "\n";
echo "Sleep Sort: " . implode(", ", SortingAlgorithms::sleepSort($arr)) . "\n";



// Create a graph with 5 vertices
$graph = new Graph(5);

// Add edges to the graph
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 3);
$graph->addEdge(3, 3);

echo "Breadth First Search starting from vertex 2: ";
// Call BFS function statically
Graph::breadthFirstSearch($graph, 2);
echo "\n";

echo "Depth First Search starting from vertex 2: ";
// Call DFS function statically
Graph::depthFirstSearch($graph, 2);
echo "\n";