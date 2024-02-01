<?php
//To create a graph in PHP using an adjacency list representation, you can use arrays to represent the vertices and their corresponding adjacency lists. Here's a simple example:

//php
//Copy code


class Graph {
    private $adjacencyList = [];

    // Function to add an edge to the graph
    public function addEdge($vertex1, $vertex2) {
        // Add vertex2 to the adjacency list of vertex1
        if (!isset($this->adjacencyList[$vertex1])) {
            $this->adjacencyList[$vertex1] = [];
        }
        $this->adjacencyList[$vertex1][] = $vertex2;

        // Add vertex1 to the adjacency list of vertex2 (since the graph is undirected)
        if (!isset($this->adjacencyList[$vertex2])) {
            $this->adjacencyList[$vertex2] = [];
        }
        $this->adjacencyList[$vertex2][] = $vertex1;
    }

    // Function to display the adjacency list
    public function displayGraph() {
        foreach ($this->adjacencyList as $vertex => $neighbors) {
            echo $vertex . " -> " . implode(", ", $neighbors) . "\n";
        }
    }
}

// Example usage:
$graph = new Graph();

// Adding edges to the graph
$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'E');
$graph->addEdge('D', 'E');

// Displaying the graph
$graph->displayGraph();

//In this example, the Graph class has an associative array ($adjacencyList) to store the adjacency lists for each vertex. The addEdge method adds an edge between two vertices, and the displayGraph method prints the adjacency list of each vertex.

//Feel free to modify and extend this code to suit your specific requirements or integrate it into your application as needed.


class UndirectedGraph {
    private $adjacencyList = [];

    // Function to add an edge to the graph
    public function addEdge($vertex1, $vertex2) {
        // Add vertex2 to the adjacency list of vertex1
        if (!isset($this->adjacencyList[$vertex1])) {
            $this->adjacencyList[$vertex1] = [];
        }
        $this->adjacencyList[$vertex1][] = $vertex2;

        // Add vertex1 to the adjacency list of vertex2 (since the graph is undirected)
        if (!isset($this->adjacencyList[$vertex2])) {
            $this->adjacencyList[$vertex2] = [];
        }
        $this->adjacencyList[$vertex2][] = $vertex1;
    }

    // Function to display the adjacency list
    public function displayGraph() {
        foreach ($this->adjacencyList as $vertex => $neighbors) {
            echo $vertex . " -> " . implode(", ", $neighbors) . "\n";
        }
    }
}

// Example usage:
$undirectedGraph = new UndirectedGraph();

// Adding edges to the graph
$undirectedGraph->addEdge('A', 'B');
$undirectedGraph->addEdge('A', 'C');
$undirectedGraph->addEdge('B', 'D');
$undirectedGraph->addEdge('C', 'E');
$undirectedGraph->addEdge('D', 'E');

// Displaying the graph
$undirectedGraph->displayGraph();


// /To create a directed graph in PHP using an adjacency list representation, you can adapt the previous example by removing the bidirectional connection when adding edges
class DirectedGraph {
    private $adjacencyList = [];

    // Function to add an edge to the graph
    public function addEdge($fromVertex, $toVertex) {
        // Add toVertex to the adjacency list of fromVertex
        if (!isset($this->adjacencyList[$fromVertex])) {
            $this->adjacencyList[$fromVertex] = [];
        }
        $this->adjacencyList[$fromVertex][] = $toVertex;
    }

    // Function to display the adjacency list
    public function displayGraph() {
        foreach ($this->adjacencyList as $fromVertex => $toVertices) {
            echo $fromVertex . " -> " . implode(", ", $toVertices) . "\n";
        }
    }
}

// Example usage:
$directedGraph = new DirectedGraph();

// Adding edges to the graph
$directedGraph->addEdge('A', 'B');
$directedGraph->addEdge('A', 'C');
$directedGraph->addEdge('B', 'D');
$directedGraph->addEdge('C', 'E');
$directedGraph->addEdge('D', 'E');

// Displaying the graph
$directedGraph->displayGraph();



//To create a weighted graph in PHP, you can extend the directed or undirected graph examples by associating weights with edges. Here's an example of creating a weighted directed graph:

class WeightedDirectedGraph {
    private $adjacencyList = [];

    // Function to add a weighted edge to the graph
    public function addEdge($fromVertex, $toVertex, $weight) {
        // Add toVertex with weight to the adjacency list of fromVertex
        if (!isset($this->adjacencyList[$fromVertex])) {
            $this->adjacencyList[$fromVertex] = [];
        }
        $this->adjacencyList[$fromVertex][] = ['to' => $toVertex, 'weight' => $weight];
    }

    // Function to display the adjacency list
    public function displayGraph() {
        foreach ($this->adjacencyList as $fromVertex => $edges) {
            echo $fromVertex . " -> ";
            foreach ($edges as $edge) {
                echo $edge['to'] . " (Weight: " . $edge['weight'] . "), ";
            }
            echo "\n";
        }
    }
}

// Example usage:
$weightedDirectedGraph = new WeightedDirectedGraph();

// Adding weighted edges to the graph
$weightedDirectedGraph->addEdge('A', 'B', 5);
$weightedDirectedGraph->addEdge('A', 'C', 3);
$weightedDirectedGraph->addEdge('B', 'D', 8);
$weightedDirectedGraph->addEdge('C', 'E', 2);
$weightedDirectedGraph->addEdge('D', 'E', 4);

// Displaying the graph
$weightedDirectedGraph->displayGraph();



//To create a weighted undirected graph in PHP using an adjacency list
class WeightedUndirectedGraph {
    private $adjacencyList = [];

    // Function to add a vertex to the graph
    public function addVertex($vertex) {
        if (!isset($this->adjacencyList[$vertex])) {
            $this->adjacencyList[$vertex] = [];
        }
    }

    // Function to add a weighted edge to the graph
    public function addEdge($vertex1, $vertex2, $weight) {
        $this->addVertex($vertex1);
        $this->addVertex($vertex2);

        // Add weighted edge between vertex1 and vertex2
        $this->adjacencyList[$vertex1][] = ['vertex' => $vertex2, 'weight' => $weight];
        $this->adjacencyList[$vertex2][] = ['vertex' => $vertex1, 'weight' => $weight];
    }

    // Function to display the adjacency list
    public function displayGraph() {
        echo "Weighted Adjacency List:\n";
        foreach ($this->adjacencyList as $vertex => $neighbors) {
            echo $vertex . " -> ";
            foreach ($neighbors as $neighbor) {
                echo $neighbor['vertex'] . " (Weight: " . $neighbor['weight'] . "), ";
            }
            echo "\n";
        }
    }
}

// Example usage:
$weightedUndirectedGraph = new WeightedUndirectedGraph();

// Adding weighted edges to the graph
$weightedUndirectedGraph->addEdge('A', 'B', 5);
$weightedUndirectedGraph->addEdge('A', 'C', 3);
$weightedUndirectedGraph->addEdge('B', 'D', 8);
$weightedUndirectedGraph->addEdge('C', 'E', 2);
$weightedUndirectedGraph->addEdge('D', 'E', 4);

// Displaying the weighted adjacency list
$weightedUndirectedGraph->displayGraph();

?>