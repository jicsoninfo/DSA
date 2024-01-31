<?php 
/*
//Creating an undirected graph in PHP using an adjacency list 
//representation involves managing an array where each vertex is associated with a list of its neighboring vertices.
*/
class Graph{
    private $adjacencyList = [];

    // ============================Add edge in undirected greaph start=================================
    // Function to add an edge to the graph
    public function addEdge_undirectedGraph($vertex1, $vertex2){
        // Add vertex2 to the adjacency list of vertex1
        if(!isset($this->adjacencyList[$vertex1])){
            $this->adjacencyList[$vertex1] = [];
        }
        $this->adjacencyList[$vertex1][] = $vertex2;

        //Add vertex1 to the adjecency list of verttex2 (since the graph is undirected)
        if(!isset($this->adjacencyList[$vertex2])){
            $this->adjacencyList[$vertex2] = [];
        }
        $this->adjacencyList[$vertex2][] = $vertex1;
    }
 // ============================Add edge in undirected greaph End=================================

 // ============================Display undirected greaph start=================================
    //Function to display the adjacency list
    public function displayGraph_undirectedGraph(){
        foreach($this->adjacencyList as $vertex =>$neighbors){
            echo $vertex , " -> " . implode(", ", $neighbors) . "\n";
            echo "<br>";
        }
    }
 // ============================Display undirected greaph end=================================

 // ============================ Undirected greaph static function start=================================
    public static function undirected_graph(){
        // Example usage:
        $undirectedGraph = new Graph();

        // Adding edges to the graph
        $undirectedGraph->addEdge_undirectedGraph('A', 'B');
        $undirectedGraph->addEdge_undirectedGraph('A', 'C');
        $undirectedGraph->addEdge_undirectedGraph('B', 'D');
        $undirectedGraph->addEdge_undirectedGraph('C', 'E');
        $undirectedGraph->addEdge_undirectedGraph('D', 'E');

        // Displaying the graph
        echo "================Undirected Graph============================";
        echo "<br>";
        echo "<pre>";
        print_r($undirectedGraph);
        echo "<br>";
        $undirectedGraph->displayGraph_undirectedGraph();
    }
 // ============================ Undirected greaph static function start=================================


  // ============================Add edge in directed greaph start=================================
    // Function to add an edge to the graph
    public function addEdge_directedGraph($vertex1, $vertex2){
        // Add vertex2 to the adjacency list of vertex1
        if(!isset($this->adjacencyList[$vertex1])){
            $this->adjacencyList[$vertex1] = [];
        }
        $this->adjacencyList[$vertex1][] = $vertex2;
    }
 // ============================Add edge in directed greaph End=================================

 // ============================Display directed greaph start=================================
    //Function to display the adjacency list
    public function displayGraph_directedGraph(){
        foreach($this->adjacencyList as $fromVertex =>$toVertices){
            echo $fromVertex , " -> " . implode(", ", $toVertices) . "\n";
            echo "<br>";
        }
    }
 // ============================Display directed greaph end=================================



 // ============================ directed greaph static function start=================================
    public static function directed_graph(){
        // Example usage:
        $directedGraph = new Graph();

        // Adding edges to the graph
        $directedGraph->addEdge_directedGraph('A', 'B');
        $directedGraph->addEdge_directedGraph('A', 'C');
        $directedGraph->addEdge_directedGraph('B', 'D');
        $directedGraph->addEdge_directedGraph('C', 'E');
        $directedGraph->addEdge_directedGraph('D', 'E');

        // Displaying the graph
        echo "================directed Graph============================";
        echo "<br>";
        echo "<pre>";
        print_r($directedGraph);
        echo "<br>";
        $directedGraph->displayGraph_directedGraph();
    }
// ============================ directed greaph static function start=================================

}


Graph::undirected_graph();
Graph::directed_graph();


?>