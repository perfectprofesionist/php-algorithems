<?php

class TopologicalSort
{
    private $vertices;
    private $adjacencyList;

    public function __construct($vertices)
    {
        $this->vertices = $vertices;
        $this->adjacencyList = array_fill(0, $vertices, array());
    }

    public function addEdge($source, $destination)
    {
        $this->adjacencyList[$source][] = $destination;
    }

    public function sort()
    {
        $inDegree = array_fill(0, $this->vertices, 0);

        foreach ($this->adjacencyList as $adjList) {
            foreach ($adjList as $vertex) {
                $inDegree[$vertex]++;
            }
        }

        $queue = new SplQueue();

        for ($i = 0; $i < $this->vertices; $i++) {
            if ($inDegree[$i] === 0) {
                $queue->enqueue($i);
            }
        }

        $count = 0;
        $topologicalOrder = [];

        while (!$queue->isEmpty()) {
            $vertex = $queue->dequeue();
            $topologicalOrder[] = $vertex;

            foreach ($this->adjacencyList[$vertex] as $adjVertex) {
                if (--$inDegree[$adjVertex] === 0) {
                    $queue->enqueue($adjVertex);
                }
            }

            $count++;
        }

        if ($count !== $this->vertices) {
            echo "Graph has a cycle\n";
            return;
        }

        echo "Topological order: ";
        foreach ($topologicalOrder as $vertex) {
            echo $vertex . " ";
        }
        echo "\n";
    }
}


?>
