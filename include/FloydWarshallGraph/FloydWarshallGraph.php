<?php

class FloydWarshallGraph
{
    private $vertices; // Number of vertices in the graph
    private $graph;    // Adjacency matrix representation of the graph

    // Constructor to initialize the graph with a given number of vertices
    public function __construct($vertices)
    {
        $this->vertices = $vertices;
        // Initialize the graph with all edges having weight INF (infinity)
        $this->graph = array_fill(0, $vertices, array_fill(0, $vertices, INF));
    }

    // Method to add an edge between two vertices with a given weight
    public function addEdge($source, $destination, $weight)
    {
        $this->graph[$source][$destination] = $weight;
    }

    // Method to perform Floyd-Warshall algorithm to find the shortest distances between all pairs of vertices
    public function floydWarshall()
    {
        $distances = $this->graph;

        // Iterate through all vertices and update shortest distances using all vertices as intermediate nodes
        for ($k = 0; $k < $this->vertices; $k++) {
            for ($i = 0; $i < $this->vertices; $i++) {
                for ($j = 0; $j < $this->vertices; $j++) {
                    // If vertex k is on the shortest path from i to j, update the distance
                    if ($distances[$i][$k] + $distances[$k][$j] < $distances[$i][$j]) {
                        $distances[$i][$j] = $distances[$i][$k] + $distances[$k][$j];
                    }
                }
            }
        }

        // Print the shortest distances between all pairs of vertices
        $this->printSolution($distances);
    }

    // Method to print the shortest distances between all pairs of vertices
    private function printSolution($distances)
    {
        echo "Shortest distances between all pairs of vertices:\n";
        for ($i = 0; $i < $this->vertices; $i++) {
            for ($j = 0; $j < $this->vertices; $j++) {
                if ($distances[$i][$j] == INF) {
                    echo "INF ";
                } else {
                    echo $distances[$i][$j] . " ";
                }
            }
            echo "\n";
        }
    }
}



?>
