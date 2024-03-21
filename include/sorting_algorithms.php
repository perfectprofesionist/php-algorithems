<?php

class SortingAlgorithms {
    
    // Bubble Sort
    public static function bubbleSort($array) {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
    
    // Selection Sort
    public static function selectionSort($array) {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($array[$j] < $array[$minIndex]) {
                    $minIndex = $j;
                }
            }
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
        }
        return $array;
    }
    
    // Insertion Sort
    public static function insertionSort($array) {
        $n = count($array);
        for ($i = 1; $i < $n; $i++) {
            $key = $array[$i];
            $j = $i - 1;
            while ($j >= 0 && $array[$j] > $key) {
                $array[$j + 1] = $array[$j];
                $j = $j - 1;
            }
            $array[$j + 1] = $key;
        }
        return $array;
    }
    
    
    // Merge Sort
    public static function mergeSort($array) {
        $n = count($array);
        // Base case: if the array has 0 or 1 elements, it's already sorted
        if ($n <= 1) {
            return $array;
        }
        
        // Split the array into two halves
        $mid = floor($n / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);
        
        // Recursively sort each half
        $left = self::mergeSort($left);
        $right = self::mergeSort($right);
        
        // Merge the sorted halves
        return self::merge($left, $right);
    }
    
    // Helper function to merge two sorted arrays
    private static function merge($left, $right) {
        $result = [];
        $leftLength = count($left);
        $rightLength = count($right);
        $i = 0; // Index for the left array
        $j = 0; // Index for the right array
        
        // Compare elements from left and right arrays and merge them into the result array
        while ($i < $leftLength && $j < $rightLength) {
            if ($left[$i] < $right[$j]) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }
        
        // Merge any remaining elements in the left and right arrays
        while ($i < $leftLength) {
            $result[] = $left[$i];
            $i++;
        }
        while ($j < $rightLength) {
            $result[] = $right[$j];
            $j++;
        }
        
        return $result;
    }
    
    // Quick Sort
    public static function quickSort($array) {
        $n = count($array);
        // Base case: if the array has 0 or 1 elements, it's already sorted
        if ($n <= 1) {
            return $array;
        }
        
        // Choose a pivot element (in this case, the last element)
        $pivot = $array[$n - 1];
        
        // Partition the array into two halves: elements less than pivot and elements greater than pivot
        $left = $right = [];
        for ($i = 0; $i < $n - 1; $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
        
        // Recursively sort each half
        $left = self::quickSort($left);
        $right = self::quickSort($right);
        
        // Combine the sorted halves and pivot element to get the final sorted array
        return array_merge($left, [$pivot], $right);
    }
    
    // Heap Sort
    public static function heapSort($array) {
        $n = count($array);

        // Build heap (rearrange array)
        for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
            self::heapify($array, $n, $i);
        }

        // One by one extract an element from heap
        for ($i = $n - 1; $i > 0; $i--) {
            // Move current root to end
            $temp = $array[0];
            $array[0] = $array[$i];
            $array[$i] = $temp;

            // call max heapify on the reduced heap
            self::heapify($array, $i, 0);
        }
        
        return $array;
    }

    // To heapify a subtree rooted with node i which is an index in arr[]. n is size of heap
    private static function heapify(&$array, $n, $i) {
        $largest = $i; // Initialize largest as root
        $left = 2 * $i + 1; // left = 2*i + 1
        $right = 2 * $i + 2; // right = 2*i + 2

        // If left child is larger than root
        if ($left < $n && $array[$left] > $array[$largest]) {
            $largest = $left;
        }

        // If right child is larger than largest so far
        if ($right < $n && $array[$right] > $array[$largest]) {
            $largest = $right;
        }

        // If largest is not root
        if ($largest != $i) {
            $temp = $array[$i];
            $array[$i] = $array[$largest];
            $array[$largest] = $temp;

            // Recursively heapify the affected sub-tree
            self::heapify($array, $n, $largest);
        }
    }
    
    // Shell Sort
    public static function shellSort($array) {
        $n = count($array);
        
        // Start with a large gap, then reduce the gap until it becomes 1
        for ($gap = floor($n / 2); $gap > 0; $gap = floor($gap / 2)) {
            // Perform insertion sort for elements at gap distance
            for ($i = $gap; $i < $n; $i++) {
                $temp = $array[$i];
                
                // Shift earlier gap-sorted elements up until the correct position for array[$i] is found
                for ($j = $i; $j >= $gap && $array[$j - $gap] > $temp; $j -= $gap) {
                    $array[$j] = $array[$j - $gap];
                }
                
                // Insert the current element at its correct position
                $array[$j] = $temp;
            }
        }
        
        return $array;
    }
    
    // Radix Sort
    public static function radixSort($array) {
        // Find the maximum number to know the number of digits
        $max = max($array);
        
        // Do counting sort for every digit. Note that instead of passing digit number, exp is passed. exp is 10^i where i is the current digit number
        for ($exp = 1; $max / $exp > 0; $exp *= 10) {
            self::countingSortHelper($array, $exp);
        }
        
        return $array;
    }

    // A function to do counting sort of $array[] according to the digit represented by exp
    private static function countingSortHelper(&$array, $exp) {
        $n = count($array);
        $output = [];
        $count = array_fill(0, 10, 0);
        
        // Store count of occurrences in count[]
        for ($i = 0; $i < $n; $i++) {
            $index = ($array[$i] / $exp) % 10;
            $count[$index]++;
        }
        
        // Change count[i] so that count[i] now contains actual position of this digit in output[]
        for ($i = 1; $i < 10; $i++) {
            $count[$i] += $count[$i - 1];
        }
        
        // Build the output array
        for ($i = $n - 1; $i >= 0; $i--) {
            $index = ($array[$i] / $exp) % 10;
            $output[$count[$index] - 1] = $array[$i];
            $count[$index]--;
        }
        
        // Copy the output array to $array[], so that $array[] now contains sorted numbers according to current digit
        for ($i = 0; $i < $n; $i++) {
            $array[$i] = $output[$i];
        }
    }
    
    // Counting Sort
    public static function countingSort($array) {
        // Find the maximum value in the array
        $max = max($array);
        // Find the minimum value in the array
        $min = min($array);
        
        // Create an array to store the count of each element
        $count = array_fill($min, $max - $min + 1, 0);
        
        // Count the occurrences of each element
        foreach ($array as $value) {
            $count[$value - $min]++;
        }
        
        // Reconstruct the sorted array
        $result = [];
        foreach ($count as $key => $value) {
            for ($i = 0; $i < $value; $i++) {
                $result[] = $key;
            }
        }
        
        return $result;
    }
    
    // Bucket Sort
    public static function bucketSort($array) {
        // Find the maximum and minimum values in the array
        $max = max($array);
        $min = min($array);
        
        // Calculate the range of each bucket
        $bucketSize = ceil(($max - $min + 1) / count($array));
        
        // Create an empty array of buckets
        $buckets = array_fill(0, count($array), []);

        // Distribute elements into buckets
        foreach ($array as $value) {
            $bucketIndex = floor(($value - $min) / $bucketSize);
            array_push($buckets[$bucketIndex], $value);
        }

        // Sort each bucket
        foreach ($buckets as &$bucket) {
            sort($bucket);
        }

        // Concatenate all sorted buckets
        $result = [];
        foreach ($buckets as $bucket) {
            $result = array_merge($result, $bucket);
        }

        return $result;
    }
    
    // Cocktail Shaker Sort
    public static function cocktailShakerSort($array) {
        $n = count($array);
        $left = 0;
        $right = $n - 1;
        $swapped = true;

        while ($left < $right && $swapped) {
            $swapped = false;

            // Perform a bubble sort from left to right
            for ($i = $left; $i < $right; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    self::swap($array, $i, $i + 1);
                    $swapped = true;
                }
            }
            $right--;

            // Perform a bubble sort from right to left
            for ($i = $right; $i > $left; $i--) {
                if ($array[$i] < $array[$i - 1]) {
                    self::swap($array, $i, $i - 1);
                    $swapped = true;
                }
            }
            $left++;
        }

        return $array;
    }

    // Helper function to swap two elements in an array
    private static function swap(&$array, $index1, $index2) {
        $temp = $array[$index1];
        $array[$index1] = $array[$index2];
        $array[$index2] = $temp;
    }
    
    // Comb Sort
    public static function combSort($array) {
        $n = count($array);
        $gap = $n;
        $shrink = 1.3;
        $swapped = true;

        while ($gap > 1 || $swapped) {
            // Update the gap value
            $gap = max(1, floor($gap / $shrink));
            $swapped = false;

            // Compare elements with the current gap
            for ($i = 0; $i + $gap < $n; $i++) {
                if ($array[$i] > $array[$i + $gap]) {
                    // Swap elements if they are out of order
                    self::swap($array, $i, $i + $gap);
                    $swapped = true;
                }
            }
        }

        return $array;
    }
    
    // Gnome Sort
    public static function gnomeSort($array) {
        $n = count($array);
        $index = 0;

        while ($index < $n) {
            if ($index == 0) {
                $index++;
            }

            if ($array[$index] >= $array[$index - 1]) {
                // If current element is greater than or equal to previous element, move to the next element
                $index++;
            } else {
                // If current element is less than previous element, swap them and move back one position
                self::swap($array, $index, $index - 1);
                $index--;
            }
        }

        return $array;
    }
    
    // Cycle Sort
    public static function cycleSort($array) {
        $n = count($array);
        
        // Traverse array elements to cycle through each element
        for ($start = 0; $start < $n - 1; $start++) {
            $item = $array[$start];
            $pos = $start;
            
            // Find position where we put the element
            for ($i = $start + 1; $i < $n; $i++) {
                if ($array[$i] < $item) {
                    $pos++;
                }
            }
            
            // If the element is already in the correct position, move to the next element
            if ($pos == $start) {
                continue;
            }
            
            // Skip duplicates
            while ($item == $array[$pos]) {
                $pos++;
            }
            
            // Swap the elements
            if ($pos != $start) {
                $temp = $array[$pos];
                $array[$pos] = $item;
                $item = $temp;
            }
            
            // Rotate the rest of the cycle
            while ($pos != $start) {
                $pos = $start;
                
                // Find position where we put the element
                for ($i = $start + 1; $i < $n; $i++) {
                    if ($array[$i] < $item) {
                        $pos++;
                    }
                }
                
                // Skip duplicates
                while ($item == $array[$pos]) {
                    $pos++;
                }
                
                // Swap the elements
                if ($item != $array[$pos]) {
                    $temp = $array[$pos];
                    $array[$pos] = $item;
                    $item = $temp;
                }
            }
        }
        
        return $array;
    }
    
    // Pancake Sort
    public static function pancakeSort($array) {
        $n = count($array);
        
        // Start from the complete array and one by one reduce current size by one
        for ($currSize = $n; $currSize > 1; $currSize--) {
            // Find the index of the maximum element in the current array
            $maxIndex = self::findMaxIndex($array, $currSize);
            
            // Move the maximum element to the beginning of the array if it's not already at the beginning
            if ($maxIndex != $currSize - 1) {
                // Flip the array from index 0 to $maxIndex to move the maximum element to the beginning
                self::flip($array, $maxIndex);
                
                // Flip the array again to move the maximum element to its correct position
                self::flip($array, $currSize - 1);
            }
        }
        
        return $array;
    }
    
    // Helper function to find the index of the maximum element in the array up to a given size
    private static function findMaxIndex(&$array, $size) {
        $maxIndex = 0;
        for ($i = 0; $i < $size; $i++) {
            if ($array[$i] > $array[$maxIndex]) {
                $maxIndex = $i;
            }
        }
        return $maxIndex;
    }
    
    // Helper function to flip the array elements from index 0 to $end
    private static function flip(&$array, $end) {
        $start = 0;
        while ($start < $end) {
            $temp = $array[$start];
            $array[$start] = $array[$end];
            $array[$end] = $temp;
            $start++;
            $end--;
        }
    }
    
    // Bogosort
    public static function bogoSort($array) {
        // Continue shuffling the array until it becomes sorted
        while (!self::isSorted($array)) {
            shuffle($array);
        }
        
        return $array;
    }
    
    // Helper function to check if the array is sorted
    private static function isSorted($array) {
        $n = count($array);
        for ($i = 1; $i < $n; $i++) {
            if ($array[$i - 1] > $array[$i]) {
                return false;
            }
        }
        return true;
    }
    
    // Stooge Sort
    public static function stoogeSort($array, $left = 0, $right = null) {
        if ($right === null) {
            $right = count($array) - 1;
        }
        
        // If the leftmost element is greater than the rightmost element, swap them
        if ($array[$left] > $array[$right]) {
            self::swap($array, $left, $right);
        }
        
        // If there are more than two elements in the array
        if ($right - $left + 1 > 2) {
            $third = floor(($right - $left + 1) / 3);
            
            // Recursively sort the first 2/3 elements
            self::stoogeSort($array, $left, $right - $third);
            
            // Recursively sort the last 2/3 elements
            self::stoogeSort($array, $left + $third, $right);
            
            // Recursively sort the first 2/3 elements again to ensure the entire array is sorted
            self::stoogeSort($array, $left, $right - $third);
        }
        
        return $array;
    }
    
    // Bead Sort
    public static function beadSort($array) {
        // Find the maximum value in the array
        $max = max($array);
        
        // Create an empty 2D array of beads
        $beads = array_fill(0, count($array), array_fill(0, $max, 0));

        // Place beads on the wires
        for ($i = 0; $i < count($array); $i++) {
            for ($j = 0; $j < $array[$i]; $j++) {
                $beads[$i][$j] = 1;
            }
        }

        // Count the number of beads above each wire
        for ($i = 0; $i < $max; $i++) {
            $sum = 0;
            for ($j = 0; $j < count($array); $j++) {
                $sum += $beads[$j][$i];
                $beads[$j][$i] = 0;
            }

            // Place the beads back on the wires
            for ($j = count($array) - 1; $j >= count($array) - $sum; $j--) {
                $beads[$j][$i] = 1;
            }
        }

        // Calculate the sorted array based on the number of beads above each wire
        $result = [];
        for ($i = 0; $i < count($array); $i++) {
            $count = 0;
            for ($j = 0; $j < $max && $beads[$i][$j] == 1; $j++) {
                $count++;
            }
            $result[] = $count;
        }

        return $result;
    }


    // Sleep Sort
    public static function sleepSort($array) {
        // Array to store the sorted elements
        $sorted = [];

        // Function to sort each element in a separate thread
        $sortElement = function ($value) use (&$sorted) {
            // Sleep for a duration proportional to the element's value
            usleep($value * 1000);
            // Add the element to the sorted array after the sleep duration
            $sorted[] = $value;
        };

        // Create a separate thread for each element to sort them concurrently
        foreach ($array as $value) {
            // Create a new thread for sorting each element
            // Note: This implementation assumes the availability of threading support in PHP
            // If threading is not available, an alternative approach using processes or asynchronous programming can be used
            // This implementation may not work correctly in all environments
            // Ensure to use a suitable environment that supports threading or adapt the implementation accordingly
            // Consult PHP documentation or third-party libraries for threading support
            $thread = new Thread($sortElement, $value);
            $thread->start();
        }

        // Wait for all threads to finish
        foreach ($array as $value) {
            $thread->join();
        }

        return $sorted;
    }
}

?>
