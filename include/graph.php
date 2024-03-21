<?php
class Graph {
    private $vertices; // Number of vertices in the graph
    private $adjacencyList; // Adjacency list representation of the graph

    // Constructor to initialize the graph with a given number of vertices
    public function __construct($vertices) {
        $this->vertices = $vertices;
        // Initialize the adjacency list with empty arrays for each vertex
        $this->adjacencyList = array_fill(0, $vertices, []);
    }

    // Method to add an edge between two vertices
    public function addEdge($src, $dest) {
        // Add destination vertex to the adjacency list of the source vertex
        $this->adjacencyList[$src][] = $dest;
        // For undirected graph, uncomment below line to add source to destination as well
        // $this->adjacencyList[$dest][] = $src;
    }

    // Method to perform Breadth-First Search (BFS) traversal starting from a given vertex
    public function breadthFirstSearch($start) {
        // Initialize an array to keep track of visited vertices
        $visited = array_fill(0, $this->vertices, false);
        // Initialize a queue for BFS traversal
        $queue = [];
        // Mark the start vertex as visited and enqueue it
        $visited[$start] = true;
        $queue[] = $start;

        // Iterate through the queue until it is empty
        while (!empty($queue)) {
            // Dequeue a vertex from the queue and print it
            $current = array_shift($queue);
            echo $current . " ";

            // Iterate through the adjacent vertices of the dequeued vertex
            foreach ($this->adjacencyList[$current] as $neighbor) {
                // If the adjacent vertex has not been visited, mark it as visited and enqueue it
                if (!$visited[$neighbor]) {
                    $visited[$neighbor] = true;
                    $queue[] = $neighbor;
                }
            }
        }
    }

    // Method to perform Depth-First Search (DFS) traversal starting from a given vertex
    public function depthFirstSearch($start) {
        // Initialize an array to keep track of visited vertices
        $visited = array_fill(0, $this->vertices, false);
        // Call the DFS utility function to perform traversal recursively
        $this->DFSUtil($start, $visited);
    }

    // Utility function for DFS traversal recursively
    private function DFSUtil($vertex, &$visited) {
        // Mark the current vertex as visited and print it
        $visited[$vertex] = true;
        echo $vertex . " ";

        // Iterate through the adjacent vertices of the current vertex
        foreach ($this->adjacencyList[$vertex] as $neighbor) {
            // If the adjacent vertex has not been visited, recursively call DFSUtil on it
            if (!$visited[$neighbor]) {
                $this->DFSUtil($neighbor, $visited);
            }
        }
    }
}