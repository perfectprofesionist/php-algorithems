<?php

class SearchingAlgorithms {
    
    // Linear Search
    public static function linearSearch($array, $target) {
        // Get the length of the array
        $length = count($array);
        // Iterate through each element of the array
        for ($index = 0; $index < $length; $index++) {
            // Check if the current element is equal to the target
            if ($array[$index] == $target)
                // If found, return the index
                return $index;
        }
        // If target not found, return -1
        return -1;
    }
    
    // Binary Search (requires sorted array)
    public static function binarySearch($array, $target) {
        // Initialize left and right pointers
        $left = 0;
        $right = count($array) - 1;
        // Loop until the left pointer crosses the right pointer
        while ($left <= $right) {
            // Calculate mid index
            $mid = floor(($left + $right) / 2);
            // If target is found at mid, return mid index
            if ($array[$mid] == $target)
                return $mid;
            // If target is greater, search in the right half
            if ($array[$mid] < $target)
                $left = $mid + 1;
            // If target is smaller, search in the left half
            else
                $right = $mid - 1;
        }
        // If target not found, return -1
        return -1;
    }
    
    // Interpolation Search (requires sorted array)
    public static function interpolationSearch($array, $target) {
        // Get the length of the array
        $length = count($array);
        // Initialize low and high pointers
        $low = 0;
        $high = $length - 1;
        // Loop until low pointer is less than or equal to high pointer
        while ($low <= $high && $target >= $array[$low] && $target <= $array[$high]) {
            // If low and high pointers are at the same index
            if ($low == $high) {
                // If target found at this index, return the index
                if ($array[$low] == $target)
                    return $low;
                // If target not found, return -1
                return -1;
            }
            // Estimate position using interpolation formula
            $position = $low + (($high - $low) / ($array[$high] - $array[$low])) * ($target - $array[$low]);
            // If target found at estimated position, return the index
            if ($array[$position] == $target)
                return $position;
            // If target is greater, search in the right half
            if ($array[$position] < $target)
                $low = $position + 1;
            // If target is smaller, search in the left half
            else
                $high = $position - 1;
        }
        // If target not found, return -1
        return -1;
    }
    
    // Exponential Search (requires sorted array)
    public static function exponentialSearch($array, $target) {
        // Get the length of the array
        $length = count($array);
        // If first element is the target, return 0
        if ($array[0] == $target)
            return 0;
        // Initialize index and compare it to the length
        $index = 1;
        // Double the index until it's smaller than the length and target is greater than or equal to the current element
        while ($index < $length && $array[$index] <= $target)
            $index = $index * 2;
        // Perform binary search between previous index and minimum of doubled index and length
        return self::binarySearch($array, $target, $index / 2, min($index, $length - 1));
    }
    
    // Jump Search (requires sorted array)
    public static function jumpSearch($array, $target) {
        // Get the length of the array
        $length = count($array);
        // Determine the jump size
        $step = sqrt($length);
        // Initialize previous pointer
        $prev = 0;
        // Jump ahead until the target is less than or equal to the current block
        while ($array[min($step, $length) - 1] < $target) {
            $prev = $step;
            $step += sqrt($length);
            // If previous pointer is equal to or exceeds the length, target not found
            if ($prev >= $length)
                return -1;
        }
        // Perform linear search within the block
        while ($array[$prev] < $target) {
            $prev++;
            // If previous pointer reaches the end of the block, target not found
            if ($prev == min($step, $length))
                return -1;
        }
        // If target found, return the index
        if ($array[$prev] == $target)
            return $prev;
        // If target not found, return -1
        return -1;
    }
    
    // Ternary Search (requires sorted array)
    public static function ternarySearch($array, $left, $right, $target) {
        // If right pointer is greater than or equal to left pointer
        if ($right >= $left) {
            // Calculate mid1 and mid2
            $mid1 = $left + ($right - $left) / 3;
            $mid2 = $right - ($right - $left) / 3;
            // If target found at mid1, return mid1
            if ($array[$mid1] == $target)
                return $mid1;
            // If target found at mid2, return mid2
            if ($array[$mid2] == $target)
                return $mid2;
            // If target is smaller than element at mid1, search in the left third
            if ($target < $array[$mid1])
                return self::ternarySearch($array, $left, $mid1 - 1, $target);
            // If target is greater than element at mid2, search in the right third
            elseif ($target > $array[$mid2])
                return self::ternarySearch($array, $mid2 + 1, $right, $target);
            // If target is between mid1 and mid2, search in the middle third
            else
                return self::ternarySearch($array, $mid1 + 1, $mid2 - 1, $target);
        }
        // If target not found, return -1
        return -1;
    }
}
?>
