

<?php
//Php program for Bubble sort on linked list. 
// Php program for
// Bubble Sort For Linked List
class Node
{
    public $data;
    public $next;
    function  __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}class LinkedList
{
    public $head;
    // Class constructors
    function  __construct()
    {
        $this->head = NULL;
    }
    // Add node at the beginning of linked list
    function insert($value)
    {
        // Create a new node
        $node = new Node($value);
        // Add node at front
        $node->next = $this->head;
        // Make new head
        $this->head = $node;
    }
    // Display all elements
    function display()
    {
        if ($this->head != NULL)
        {
            $temp = $this->head;
            while ($temp != NULL)
            {
                // Display node value
                echo "  ", $temp->data;
                // Visit to next node
                $temp = $temp->next;
            }
        }
        else
        {
            echo "Empty Linked list\n";
        }
    }
    // Perform bubble sort in single linked list
    function bubbleSort()
    {
        if ($this->head != NULL)
        {
            $current = NULL;
            $status = false;
            do
            {
                // Start with first node
                $current = $this->head;
                // Reset working status
                $status = false;
                while ($current != NULL && $current->next != NULL)
                {
                    if ($current->data > $current->next->data)
                    {
                        // Swap node values
                        $current->data = $current->data + $current->next->data;
                        $current->next->data = $current->data - $current->next->data;
                        $current->data = $current->data - $current->next->data;
                        // When node value change
                        $status = true;
                    }
                    // Visit to next node
                    $current = $current->next;
                }
            }  while ($status);
        }
        else
        {
            echo "Empty Linked list\n";
        }
    }
    function run()
    {
        $task = new LinkedList();
        // Insert element of linked list
        $task->insert(15);
        $task->insert(5);
        $task->insert(42);
        $task->insert(9);
        $task->insert(50);
        $task->insert(7);
        echo " Before sort : ";
        // Display all node
        $task->display();
        $task->bubbleSort();
        echo "\n After sort  : ";
        $task->display();
    }
}
LinkedList::run();

// Output

//  Before sort :   7  50  9  42  5  15
//  After sort  :   5  7  9  15  42  50