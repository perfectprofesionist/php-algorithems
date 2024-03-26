<?php

class Edge
{
    public $source, $destination, $weight;

    // Constructor to initialize an edge with source, destination, and weight
    public function __construct($source, $destination, $weight)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->weight = $weight;
    }
}