# Topological Sorting in PHP

This repository contains a PHP implementation of Topological Sorting using classes and objects.

## Description

Topological sorting is a linear ordering of vertices in a directed graph where for every directed edge from vertex A to vertex B, vertex A comes before vertex B in the ordering. It is often used in scheduling tasks and dependencies.

This implementation uses a queue-based approach to perform topological sorting on a directed graph represented using adjacency lists.

## Installation

No special installation steps are required. You can simply download or clone the repository to your local machine to use the code.

## Usage

1. Include the `TopologicalSort` class in your PHP script.
2. Create an instance of the `TopologicalSort` class with the desired number of vertices.
3. Add edges to the graph using the `addEdge()` method, specifying the source and destination vertices.
4. Call the `sort()` method to perform topological sorting and print the order.

Example:

```php
<?php

// Include the TopologicalSort class file
include 'TopologicalSort.php';

// Create a graph with 6 vertices
$graph = new TopologicalSort(6);

// Add edges to the graph
$graph->addEdge(5, 2);
$graph->addEdge(5, 0);
$graph->addEdge(4, 0);
$graph->addEdge(4, 1);
$graph->addEdge(2, 3);
$graph->addEdge(3, 1);

// Perform topological sorting
echo "Topological Sorting of the graph:\n";
$graph->sort();

?>
