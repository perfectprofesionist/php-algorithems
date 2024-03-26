# Floyd-Warshall Algorithm in PHP

This repository contains a PHP implementation of the Floyd-Warshall algorithm for finding the shortest paths between all pairs of vertices in a weighted graph.

## Description

The Floyd-Warshall algorithm is a dynamic programming algorithm used to find the shortest distances between all pairs of vertices in a weighted graph. It works by iteratively updating the shortest distances between every pair of vertices using all intermediate vertices. This implementation utilizes an adjacency matrix to represent the graph and computes the shortest distances between all pairs of vertices.

## Installation

No special installation steps are required. You can simply download or clone the repository to your local machine to use the code.

## Usage

1. Include the `FloydWarshallGraph` class in your PHP script.
2. Create an instance of the `FloydWarshallGraph` class with the desired number of vertices.
3. Add edges to the graph using the `addEdge()` method, specifying the source vertex, destination vertex, and edge weight.
4. Call the `floydWarshall()` method to perform the Floyd-Warshall algorithm and print the shortest distances between all pairs of vertices.

Example:

```php
// Include the FloydWarshallGraph class file
include 'FloydWarshallGraph.php';

// Create a graph with 4 vertices
$graph = new FloydWarshallGraph(4);

// Add edges with weights to the graph
$graph->addEdge(0, 1, 5);
$graph->addEdge(0, 3, 10);
$graph->addEdge(1, 2, 3);
$graph->addEdge(2, 3, 1);
$graph->addEdge(3, 0, 2);
$graph->addEdge(3, 1, 9);

// Perform Floyd-Warshall algorithm to find the shortest distances between all pairs of vertices
$graph->floydWarshall();
```

## Contributing

Contributions are welcome! If you'd like to contribute to this repository, please fork the project, make your changes, and submit a pull request.
