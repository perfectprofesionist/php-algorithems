<?php

class DijkstraGraph
{
    private $vertices; // Number of vertices in the graph
    private $graph;    // Adjacency matrix representation of the graph

    // Constructor to initialize the graph with a given number of vertices
    public function __construct($vertices)
    {
        $this->vertices = $vertices;
        // Initialize the graph with all edges having weight 0
        $this->graph = array_fill(0, $vertices, array_fill(0, $vertices, 0));
    }

    // Method to add an edge between two vertices with a given weight
    public function addEdge($source, $destination, $weight)
    {
        // Add the edge in both directions since the graph is undirected
        $this->graph[$source][$destination] = $weight;
        $this->graph[$destination][$source] = $weight;
    }

    // Method to perform Dijkstra's algorithm starting from a given source vertex
    public function dijkstra($source)
    {
        // Array to keep track of visited vertices
        $visited = array_fill(0, $this->vertices, false);
        // Array to store the shortest distance from the source vertex to each vertex
        $distance = array_fill(0, $this->vertices, PHP_INT_MAX);
        // Distance from source to itself is 0
        $distance[$source] = 0;

        // Iterate through all vertices
        for ($count = 0; $count < $this->vertices - 1; $count++) {
            // Find the vertex with the minimum distance from the source vertex
            $minDistance = $this->minDistance($distance, $visited);
            // Mark the selected vertex as visited
            $visited[$minDistance] = true;

            // Update the distance values of adjacent vertices of the selected vertex
            for ($vertex = 0; $vertex < $this->vertices; $vertex++) {
                // Update distance only if the vertex is not visited, there is an edge from the selected vertex to this vertex,
                // the distance to the selected vertex is not infinity, and the new distance is shorter than the current distance
                if (!$visited[$vertex] && $this->graph[$minDistance][$vertex] && $distance[$minDistance] != PHP_INT_MAX
                    && $distance[$minDistance] + $this->graph[$minDistance][$vertex] < $distance[$vertex]) {
                    // Update the distance to this vertex
                    $distance[$vertex] = $distance[$minDistance] + $this->graph[$minDistance][$vertex];
                }
            }
        }

        // Print the shortest distances from the source vertex to all other vertices
        $this->printSolution($distance, $source);
    }

    // Method to find the vertex with the minimum distance from the source vertex
    private function minDistance($distance, $visited)
    {
        $min = PHP_INT_MAX;
        $minIndex = 0;

        for ($v = 0; $v < $this->vertices; $v++) {
            // Find the minimum distance vertex that has not been visited yet
            if (!$visited[$v] && $distance[$v] <= $min) {
                $min = $distance[$v];
                $minIndex = $v;
            }
        }

        return $minIndex;
    }

    // Method to print the shortest distances from the source vertex to all other vertices
    private function printSolution($distance, $source)
    {
        echo "Vertex \t Distance from Source\n";
        for ($i = 0; $i < $this->vertices; $i++) {
            // Print the vertex and its shortest distance from the source vertex
            echo "$i \t\t $distance[$i]\n";
        }
    }
}

?>
