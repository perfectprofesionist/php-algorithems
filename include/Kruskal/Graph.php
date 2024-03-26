<?php

class Graph
{
    private $verticesCount; // Number of vertices in the graph
    private $edges;    // Array to store edges of the graph

    // Constructor to initialize the graph with a given number of vertices
    public function __construct($verticesCount)
    {
        $this->verticesCount = $verticesCount;
        $this->edges = array();
    }

    // Method to add an edge to the graph
    public function addEdge($source, $destination, $weight)
    {
        $this->edges[] = new Edge($source, $destination, $weight);
    }

    // Method to find the parent of a vertex in the disjoint set
    private function findParent(&$parent, $vertex)
    {
        if ($parent[$vertex] == $vertex)
            return $vertex;
        return $this->findParent($parent, $parent[$vertex]);
    }

    // Method to perform union of two sets in the disjoint set
    private function union(&$parent, &$rank, $x, $y)
    {
        $xRoot = $this->findParent($parent, $x);
        $yRoot = $this->findParent($parent, $y);

        // Attach smaller rank tree under root of high rank tree
        if ($rank[$xRoot] < $rank[$yRoot])
            $parent[$xRoot] = $yRoot;
        elseif ($rank[$xRoot] > $rank[$yRoot])
            $parent[$yRoot] = $xRoot;
        else {
            $parent[$yRoot] = $xRoot;
            $rank[$xRoot]++;
        }
    }

    // Method to perform Kruskal's algorithm to find the minimum spanning tree
    public function findMinimumSpanningTree()
    {
        $minimumSpanningTree = array(); // Array to store the edges of the minimum spanning tree

        // Sort all the edges in non-decreasing order of their weight
        usort($this->edges, function($a, $b) {
            return $a->weight - $b->weight;
        });

        $parent = array();
        $rank = array_fill(0, $this->verticesCount, 0);

        // Initialize each vertex as a separate subset with only one element
        for ($i = 0; $i < $this->verticesCount; ++$i) {
            $parent[$i] = $i;
        }

        // Number of edges to be taken is equal to vertices - 1
        $edgesCount = 0;
        $i = 0;
        while ($edgesCount < $this->verticesCount - 1) {
            $nextEdge = $this->edges[$i++];
            $sourceParent = $this->findParent($parent, $nextEdge->source);
            $destinationParent = $this->findParent($parent, $nextEdge->destination);

            // If including this edge does not form a cycle, add it to the minimum spanning tree
            if ($sourceParent != $destinationParent) {
                $minimumSpanningTree[] = $nextEdge;
                $this->union($parent, $rank, $sourceParent, $destinationParent);
                ++$edgesCount;
            }
        }

        // Print the minimum spanning tree
        echo "Edges of the Minimum Spanning Tree:\n";
        foreach ($minimumSpanningTree as $edge) {
            echo $edge->source . " - " . $edge->destination . ": " . $edge->weight . "\n";
        }
    }
}