## Kruskal's Algorithm in PHP

Contains the implementation of Kruskal's algorithm in PHP, split into two files: `Edge.php` and `Graph.php`.

### Edge.php

The `Edge.php` file contains the definition of the `Edge` class, which represents an edge in a graph. Each edge has a source vertex, a destination vertex, and a weight.

### Graph.php

The `Graph.php` file contains the definition of the `Graph` class, which represents a graph and provides methods for adding edges and finding the minimum spanning tree using Kruskal's algorithm.

### Usage

To use Kruskal's algorithm, follow these steps:

1. Create a new `Graph` object by including the `Graph.php` file.
2. Add edges to the graph using the `addEdge()` method.
3. Call the `findMinimumSpanningTree()` method to find the minimum spanning tree.

Example usage:

```php
<?php

include 'Edge.php';
include 'Graph.php';

$graph = new Graph(4); // Create a graph with 4 vertices
$graph->addEdge(0, 1, 10);
$graph->addEdge(0, 2, 6);
$graph->addEdge(0, 3, 5);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 4);

$graph->findMinimumSpanningTree(); // Find the minimum spanning tree using Kruskal's algorithm

?>
```
