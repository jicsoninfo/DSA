<?php 

//phpgraph //route for graph through adjancy list
/*
//Creating an undirected graph in PHP using an adjacency list 
//representation involves managing an array where each vertex is associated with a list of its neighboring vertices.
*/
class Graph{
    private $adjacencyList = [];

//-------------------------- Undirect graph -------------------------------------------------------------------------------
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
            echo "================Undirected Graph using an adjacency list============================";
            echo "<br>";
            echo "<pre>";
            print_r($undirectedGraph);
            echo "<br>";
            $undirectedGraph->displayGraph_undirectedGraph();
        }
     // ============================ Undirected greaph static function start=================================
//-------------------------- Undirect graph -------------------------------------------------------------------------------

//-------------------------- Direct graph -------------------------------------------------------------------------------

    // ============================Add edge in directed graph start=================================
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
            echo "================directed Graph using an adjacency list============================";
            echo "<br>";
            echo "<pre>";
            print_r($directedGraph);
            echo "<br>";
            $directedGraph->displayGraph_directedGraph();
        }
    // ============================ directed greaph static function end=================================

//-------------------------- Direct graph -------------------------------------------------------------------------------


//-------------------------- Weighted direct graph -------------------------------------------------------------------------------

     // ============================Add edge in weighted directed graph start=================================
            // Function to add a weighted edge to the graph
            public function addEdge_WeightedDirectedGraph($fromVertex, $toVertex, $weight){
                // Add toVertex with weight to the adjacent list of fromVertex
                if(!isset($this->adjacencyList[$fromVertex])){
                    $this->adjacencyList[$fromVertex] = [];
                }
                $this->adjacencyList[$fromVertex][] = ['to'=> $toVertex, 'weight' => $weight];
            }
     // ============================Add edge in weighted directed graph End=================================

      // ============================Display weighted directed graph start=================================
            // Function to display the adjacency list
            public function displayGraph_WeightedDirectedGraph(){
              foreach($this->adjacencyList as $fromVertex => $edges){
                echo $fromVertex . " -> ";
                foreach($edges as $edge){
                    echo $edge['to'] . " (Weight: " .$edge['weight'] . "), ";
                }
                echo "\n";
              }
            }
     // ============================Display weighted directed graph End=================================

     // ============================ directed greaph static function start=================================
        public static function weighted_directed_graph(){
            // Example usage:
            $weightedDirectedGraph = new Graph();

            // Adding edges to the graph
            $weightedDirectedGraph->addEdge_WeightedDirectedGraph('A', 'B', 5);
            $weightedDirectedGraph->addEdge_WeightedDirectedGraph('A', 'C', 3);
            $weightedDirectedGraph->addEdge_WeightedDirectedGraph('B', 'D', 8);
            $weightedDirectedGraph->addEdge_WeightedDirectedGraph('C', 'E', 2);
            $weightedDirectedGraph->addEdge_WeightedDirectedGraph('D', 'E', 4);

            // Displaying the graph
            echo "================Weighted directed Graph using an adjacency list============================";
            echo "<br>";
            echo "<pre>";
            print_r($weightedDirectedGraph);
            echo "<br>";
            $weightedDirectedGraph->displayGraph_WeightedDirectedGraph();
        }
// ============================ directed greaph static function end=================================

//-------------------------- Weighted direct graph -------------------------------------------------------------------------------



//-------------------------- Weighted undirect graph -------------------------------------------------------------------------------

     // ============================Add vertex in weighted undirected graph start=================================
            // Function to add a vertex to the graph
            public function addVertex_WeightedUndirectedGraph($vertex){
                if(!isset($this->adjacencyList[$vertex])){
                    $this->adjacencyList[$vertex] = [];
                }
            }
     // ============================Add vertex in weighted undirected graph End=================================

     // ============================Add edge in weighted undirected graph start=================================
            // Function to add a weighted edge to the graph
            public function addEdge_WeightedUndirectedGraph($vertex1, $vertex2, $weight){
                $this->addVertex_WeightedUndirectedGraph($vertex1);
                $this->addVertex_WeightedUndirectedGraph($vertex2);
                //Add weighted edge between vertex1 and vertex2
                $this->adjacencyList[$vertex1][] = ['vertex'=> $vertex2, 'weight'=> $weight];
                $this->adjacencyList[$vertex2][] = ['vertex'=> $vertex1, 'weight'=> $weight];
            }
     // ============================Add edge in weighted undirected graph End=================================

      // ============================Display weighted undirected graph start=================================
            // Function to display the adjacency list
            public function displayGraph_WeightedUndirectedGraph(){
             echo "Weighted Adjacency List:\n";
             foreach($this->adjacencyList as $vertex => $neighbors ){
                echo $vertex . " -> ";
                foreach($neighbors as $neighbor){
                    echo $neighbor['vertex'] . "(Weight: " . $neighbor['weight'] . "), ";
                }
                echo "\n";
             }
            }
     // ============================Display weighted directed graph End=================================

     // ============================ directed greaph static function start=================================
        public static function weighted_undirected_graph(){
            // Example usage:
            $weightedUndirectedGraph = new Graph();

            // Adding edges to the graph
            $weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('A', 'B', 5);
            $weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('A', 'C', 3);
            $weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('B', 'D', 8);
            $weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('C', 'E', 2);
            $weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('D', 'E', 4);
            //$weightedUndirectedGraph->addEdge_WeightedUndirectedGraph('A', 'B', 5);

            // Displaying the graph
            echo "================Weighted Undirected Graph using an adjacency list============================";
            echo "<br>";
            echo "<pre>";
            print_r($weightedUndirectedGraph);
            echo "<br>";
            $weightedUndirectedGraph->displayGraph_WeightedUndirectedGraph();
        }
// ============================ directed greaph static function end=================================

//-------------------------- Weighted undirect graph -------------------------------------------------------------------------------



}


Graph::undirected_graph();
Graph::directed_graph();
Graph::weighted_directed_graph();
Graph::weighted_undirected_graph();


?>