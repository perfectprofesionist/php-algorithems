<?php

class BellmanFordGraph
{
    private $vertices; // Number of vertices in the graph
    private $edges;    // Number of edges in the graph
    private $graph;    // List of edges in the graph

    // Constructor to initialize the graph with a given number of vertices and edges
    public function __construct($vertices, $edges)
    {
        $this->vertices = $vertices;
        $this->edges = $edges;
        $this->graph = [];
    }

    // Method to add an edge to the graph with a source, destination, and weight
    public function addEdge($source, $destination, $weight)
    {
        $this->graph[] = [$source, $destination, $weight];
    }

    // Method to find the shortest paths from a given source vertex to all other vertices
    public function bellmanFord($source)
    {
        // Initialize distances from the source vertex to all other vertices as infinity
        $distance = array_fill(0, $this->vertices, PHP_INT_MAX);
        $distance[$source] = 0; // Distance from the source vertex to itself is 0

        // Relax all edges |vertices| - 1 times
        for ($i = 0; $i < $this->vertices - 1; $i++) {
            foreach ($this->graph as $edge) {
                $u = $edge[0];
                $v = $edge[1];
                $weight = $edge[2];
                // Update distance if the current edge can be relaxed
                if ($distance[$u] != PHP_INT_MAX && $distance[$u] + $weight < $distance[$v]) {
                    $distance[$v] = $distance[$u] + $weight;
                }
            }
        }

        // Check for negative-weight cycles
        foreach ($this->graph as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $weight = $edge[2];
            // If the distance to the destination vertex can still be improved, there is a negative-weight cycle
            if ($distance[$u] != PHP_INT_MAX && $distance[$u] + $weight < $distance[$v]) {
                echo "Graph contains negative-weight cycle\n";
                return;
            }
        }

        // Print the shortest distances from the source vertex to all other vertices
        $this->printSolution($distance, $source);
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
