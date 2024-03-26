# Dijkstra's Algorithm in PHP

This repository contains a PHP implementation of Dijkstra's algorithm for finding the shortest paths in a graph.

## Description

Dijkstra's algorithm is a popular algorithm for finding the shortest paths between nodes in a weighted graph. It works by iteratively expanding the shortest path from the source node to other nodes until all nodes have been reached. This implementation uses an adjacency matrix to represent the graph and computes the shortest distances from a given source node to all other nodes in the graph.

## Installation

No special installation steps are required. You can simply download or clone the repository to your local machine to use the code.

## Usage

1. Include the `DijkstraGraph` class in your PHP script.
2. Create an instance of the `DijkstraGraph` class with the desired number of vertices.
3. Add edges to the graph using the `addEdge()` method, specifying the source vertex, destination vertex, and edge weight.
4. Call the `dijkstra()` method with the source vertex as an argument to perform Dijkstra's algorithm and print the shortest distances from the source vertex to all other vertices.

Example:

```php
// Include the DijkstraGraph class file
include 'DijkstraGraph.php';

// Create a graph with 9 vertices
$graph = new DijkstraGraph(9);

// Add edges with weights to the graph
$graph->addEdge(0, 1, 4);
$graph->addEdge(0, 7, 8);
$graph->addEdge(1, 2, 8);
$graph->addEdge(1, 7, 11);
$graph->addEdge(2, 3, 7);
$graph->addEdge(2, 8, 2);
$graph->addEdge(2, 5, 4);
$graph->addEdge(3, 4, 9);
$graph->addEdge(3, 5, 14);
$graph->addEdge(4, 5, 10);
$graph->addEdge(5, 6, 2);
$graph->addEdge(6, 7, 1);
$graph->addEdge(6, 8, 6);
$graph->addEdge(7, 8, 7);

// Perform Dijkstra's algorithm starting from vertex 0
$graph->dijkstra(0);
