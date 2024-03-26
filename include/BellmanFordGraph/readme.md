# Bellman-Ford Algorithm in PHP

This repository contains a PHP implementation of the Bellman-Ford algorithm for finding the shortest paths from a single source vertex to all other vertices in a weighted graph. The algorithm is capable of handling graphs with negative weight edges and can detect negative-weight cycles.

## Description

The Bellman-Ford algorithm is a popular algorithm for finding the shortest paths from a single source vertex to all other vertices in a weighted graph. It works by iteratively relaxing edges, ensuring that the shortest path distances are updated until convergence is achieved or negative-weight cycles are detected. This implementation utilizes a class-based approach in PHP, providing methods to add edges to the graph and to perform the Bellman-Ford algorithm.

## Usage

1. Include the `BellmanFordGraph` class in your PHP script.
2. Create an instance of the `BellmanFordGraph` class with the desired number of vertices and edges.
3. Add edges to the graph using the `addEdge()` method, specifying the source vertex, destination vertex, and edge weight.
4. Call the `bellmanFord()` method with the source vertex as an argument to perform the Bellman-Ford algorithm and print the shortest distances from the source vertex to all other vertices.

Example:

```php
// Include the BellmanFordGraph class file
include 'BellmanFordGraph.php';

// Create a graph with 5 vertices and 8 edges
$graph = new BellmanFordGraph(5, 8);

// Add edges with weights to the graph
$graph->addEdge(0, 1, -1);
$graph->addEdge(0, 2, 4);
$graph->addEdge(1, 2, 3);
$graph->addEdge(1, 3, 2);
$graph->addEdge(1, 4, 2);
$graph->addEdge(3, 2, 5);
$graph->addEdge(3, 1, 1);
$graph->addEdge(4, 3, -3);

// Perform Bellman-Ford algorithm starting from vertex 0
$graph->bellmanFord(0);
