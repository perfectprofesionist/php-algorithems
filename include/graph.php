<?php

class Graph {
    private $vertices; // Number of vertices in the graph
    private $adjacencyList; // Adjacency list to store graph edges

    // Constructor to initialize the graph with given number of vertices
    public function __construct($vertices) {
        $this->vertices = $vertices;
        $this->adjacencyList = array_fill(0, $vertices, []);
    }

    // Function to add an edge between two vertices
    public function addEdge($src, $dest) {
        // Add destination vertex to the adjacency list of source vertex
        $this->adjacencyList[$src][] = $dest;
        // For undirected graph, uncomment below line
        // $this->adjacencyList[$dest][] = $src;
    }

    // Static function to perform Breadth First Search (BFS) starting from given vertex
    public static function breadthFirstSearch($graph, $start) {
        // Initialize array to track visited vertices
        $visited = array_fill(0, $graph->vertices, false);
        // Initialize queue for BFS traversal
        $queue = [];
        // Mark start vertex as visited and enqueue it
        $visited[$start] = true;
        $queue[] = $start;

        // Continue BFS traversal until queue is empty
        while (!empty($queue)) {
            // Dequeue a vertex from queue and print it
            $current = array_shift($queue);
            echo $current . " ";

            // Get all adjacent vertices of the dequeued vertex
            // If an adjacent vertex has not been visited, mark it as visited and enqueue it
            foreach ($graph->adjacencyList[$current] as $neighbor) {
                if (!$visited[$neighbor]) {
                    $visited[$neighbor] = true;
                    $queue[] = $neighbor;
                }
            }
        }
    }

    // Static function to perform Depth First Search (DFS) starting from given vertex
    public static function depthFirstSearch($graph, $start) {
        // Initialize array to track visited vertices
        $visited = array_fill(0, $graph->vertices, false);
        // Call DFS utility function
        $graph->DFSUtil($start, $visited);
    }

    // Utility function for DFS traversal recursively
    private function DFSUtil($vertex, &$visited) {
        // Mark current vertex as visited and print it
        $visited[$vertex] = true;
        echo $vertex . " ";

        // Recur for all vertices adjacent to this vertex
        foreach ($this->adjacencyList[$vertex] as $neighbor) {
            if (!$visited[$neighbor]) {
                $this->DFSUtil($neighbor, $visited);
            }
        }
    }
}