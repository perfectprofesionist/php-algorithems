# Prim's Algorithm in PHP

This repository contains a PHP implementation of Prim's algorithm for finding the minimum spanning tree (MST) of a graph.

## Description

Prim's algorithm is a greedy algorithm used to find the minimum spanning tree of a connected, undirected graph with weighted edges. The algorithm starts with an arbitrary vertex and grows the MST by adding the cheapest edge from the vertices already included in the MST to the vertices not yet included. This implementation uses an adjacency matrix to represent the graph and computes the minimum spanning tree by selecting the minimum weight edges at each step.

## Installation

No special installation steps are required. You can simply download or clone the repository to your local machine to use the code.

## Usage

1. Include the `PrimGraph` class in your PHP script.
2. Create an instance of the `PrimGraph` class with the desired number of vertices.
3. Add edges to the graph using the `addEdge()` method, specifying the source vertex, destination vertex, and edge weight.
4. Call the `primMST()` method to perform Prim's algorithm and print the minimum spanning tree.

Example:

```php
// Include the PrimGraph class file
include 'PrimGraph.php';

// Create a graph with 5 vertices
$graph = new PrimGraph(5);

// Add edges with weights to the graph
$graph->addEdge(0, 1, 2);
$graph->addEdge(0, 3, 6);
$graph->addEdge(1, 2, 3);
$graph->addEdge(1, 3, 8);
$graph->addEdge(1, 4, 5);
$graph->addEdge(2, 4, 7);
$graph->addEdge(3, 4, 9);

// Perform Prim's algorithm and print the minimum spanning tree
$graph->primMST();
