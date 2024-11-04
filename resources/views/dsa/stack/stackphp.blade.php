<?php 

class stackarr{
    public $s3;
    //public $s4;
    public function __construct(){
        $this->s3 = [];
        //$this->s4 = [];
    }
    public function enstack($stval){
        array_push($this->s3, $stval);
    }
    public function destack(){
        // while(count($this->s3) != 0){
        //     array_push($this->s4, array_pop($this->s3));
        // }
        // $destackval = array_pop($this->s4);
        // while(count($this->s4) !=0){
        //     array_push($this->s3, array_pop($this->s4) );
        // }
        $destackval = array_pop($this->s3);
        return $destackval;
    }
}


echo "<br />================Stack====================<br />";
$stackphp = new stackarr();
$stackphp->enstack(60);
$stackphp->enstack(65);
$stackphp->enstack(70);
$stackphp->enstack(75);
echo "<pre>";
print_r($stackphp->s3);
//$stackphp->destack();
$destvlue =  $stackphp->destack();
 print_r($destvlue);
 $stackphp->destack();


echo "<br /> ============================Statck through linked list==========================";
class node{
    public $data;
    public $next;
}

class ll{
    public $head;
    
    public function __construct(){
        $this->head = null;
    }
    
    public function front_push($newdata){
        $newnode = new node();
        $newnode->data = $newdata;
        $newnode->next = $this->head;
        $this->head = $newnode;
    }
    
    public function front_pop(){
        if($this->head != null){
            $temp = $this->head;
            $this->head = $this->head->next;
            $temp=null;
        }
    }
}

$singlell = new ll();
$singlell->front_push(12);
$singlell->front_push(16);
$singlell->front_push(19);


$singlell->front_pop();
// $singlell->front_pop();
// $singlell->front_pop();
// $singlell->front_pop();
print_r($singlell);



echo "=========Stack program through array================" . "<br>";


class Stack {
    private $items = [];

    //Initialize an empty stack
    public function __construct(){
        $this->items = [];
    }

    //Check if the stack is empty
    public function isEmpty(){
        return count($this->items) === 0;
    }

    //Add an item to the top of the satack
    public function push($item){
        $this->items[] = $item;
        //   // Calculate the next index to insert the item
        //   $nextIndex = count($this->items);
        //   // Assign the item directly to the next index
        //   $this->items[$nextIndex] = $item;
    }

    //Remove and return the top item of the stack
    public function pop(){
        if(!$this->isEmpty()){
            return array_pop($this->items);
        }else{
            throw new Exception('Pop from an empty stack');
        }
    }

    //Display the current items in the stack
    public function display() {
        echo "Stack:" . implode(", ", $this->items) . PHP_EOL;
    }

    //Return the number of items in the stack
    public function size() {
        return count($this->items);
    }

    //Return the top item of the stack without removing it
    public function peek() {
        if(!$this->isEmpty()){
            return end($this->items);
        }else{
            throw new Exception("Peek from an empty stack");
        }
    }

}


//Example usage
$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(8);
$stack->push(7);

echo "Stack display :- ";
$stack->display();

echo "Stack pop value:- ";
echo $stack->pop() . PHP_EOL; 
echo "Stack display after pop:- ";
$stack->display();
echo "Stack peak value:- ";
echo $stack->peek() . PHP_EOL;

echo "Stack Size:- ";
echo $stack->size() . PHP_EOL;




echo "=========Stack program through Linked list================" . "<br>";


class NodeLl {
    public $data;
    public $next;

    public function __construct($data){
        $this->data = $data;
        $this->next = null;
    }
}

class StackLl {
    private $top; //Pointer to the top of the stack
    private $size; //Size of the stack

    //Initialize an empty stack
    public function __construct(){
        $this->top = null;
        $this->size = 0;
    }

    //Check if the stack is empty
    public function isEmpty(){
        return $this->top === null;
    }

    //Add an item to the top of the stack
    public function push($item){
        $newNode = new NodeLl($item); //Create a new node
        $newNode->next = $this->top; //link the new node 
        $this->top = $newNode; //Update the top to the new node
        $this->size++; //Increment size
    }

    //Remove and return the top item of the stack
    public function pop(){
        if($this->isEmpty()){
            throw new Exception('Pop from an empty stack');
        }
        $poppedNode = $this->top; //Get the current top node
        $this->top = $this->top->next; // Move the toop to the next
        $this->size--; // Decrement size
        return $poppedNode->data; // Return the data of the popped
    }

    //Display the current items in the stack
    public function display(){
        $current = $this->top;
        echo "Stack:- ";
        while ($current !== null){
            echo $current->data , " ";
            $current = $current->next;
        }

        echo PHP_EOL;
    }

    //Return the number of items in the stack
    public function size(){
        return $this->size;
    }

    //Return the top item of the stack without removing it
    public function peek(){
        if($this->isEmpty()){
            throw new Exception ("Peek from an empty stack");
        }

        return $this->top->data; //Return the data of the top node 
    }

}

//Example usage
$stackll = new StackLl();
$stackll->push(1);
$stackll->push(2);
$stackll->push(3);
$stackll->push(4);
$stackll->push(8);
$stackll->push(7);

echo "Stack display :- ";
$stackll->display();

echo "Stack pop value:- ";
echo $stackll->pop() . PHP_EOL; 
echo "Stack display after pop:- ";
$stackll->display();
echo "Stack peak value:- ";
echo $stackll->peek() . PHP_EOL;

echo "Stack Size:- ";
echo $stackll->size() . PHP_EOL;




?>