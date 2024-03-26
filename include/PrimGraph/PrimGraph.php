<?php

class PrimGraph
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

    // Method to find the minimum key value vertex from the set of vertices
    private function minKey($key, $mstSet)
    {
        $min = PHP_INT_MAX;
        $minIndex = -1;

        for ($v = 0; $v < $this->vertices; $v++) {
            if (!$mstSet[$v] && $key[$v] < $min) {
                $min = $key[$v];
                $minIndex = $v;
            }
        }

        return $minIndex;
    }

    // Method to print the minimum spanning tree
    private function printMST($parent, $graph)
    {
        echo "Edge \tWeight\n";
        for ($i = 1; $i < $this->vertices; $i++) {
            echo "$parent[$i] - $i \t$graph[$i][$parent[$i]]\n";
        }
    }

    // Method to perform Prim's algorithm and print the minimum spanning tree
    public function primMST()
    {
        // Array to store the constructed minimum spanning tree
        $parent = array_fill(0, $this->vertices, -1);
        // Array to store the key values which will be used to pick the minimum weight edge
        $key = array_fill(0, $this->vertices, PHP_INT_MAX);
        // Array to store vertices included in MST
        $mstSet = array_fill(0, $this->vertices, false);

        // Start with the first vertex
        $key[0] = 0;
        $parent[0] = -1;

        // Construct the MST with vertices equal to the number of vertices in the graph
        for ($count = 0; $count < $this->vertices - 1; $count++) {
            // Pick the minimum key vertex from the set of vertices not yet included in the MST
            $u = $this->minKey($key, $mstSet);
            // Add the picked vertex to the MST set
            $mstSet[$u] = true;

            // Update key values and parent index of the adjacent vertices of the picked vertex
            for ($v = 0; $v < $this->vertices; $v++) {
                // Update key value and parent index only if the vertex is not already included in the MST,
                // there is an edge from u to v, and the weight of the edge is less than the current key value of v
                if (!$mstSet[$v] && $this->graph[$u][$v] && $this->graph[$u][$v] < $key[$v]) {
                    $parent[$v] = $u;
                    $key[$v] = $this->graph[$u][$v];
                }
            }
        }

        // Print the constructed MST
        $this->printMST($parent, $this->graph);
    }
}


?>
