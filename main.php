<?php declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

use LinkedList\Node;
use LinkedList\LinkedList;

// Simple implementation
$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);

$node1->setNext($node2);
$node2->setNext($node3);


// 2. Advanced implementation
$linkedList = new LinkedList();

// Add elements at the end with append()
$linkedList->append(new Node(1))
    ->append(new Node(2))
    ->append(new Node(3));
$linkedList->print(); // 1 => 2 => 3

// Add elements at the beginning with push()
$linkedList->push(new Node(4));
$linkedList->print(); // 4 => 1 => 2 => 3

// Add new Node after specific Node in Linked List
$linkedList
    ->addNodeAfter(new Node(99), 1)
    ->addNodeAfter(new Node(101), 0);
$linkedList->print(); //4 => 101 => 1 => 99 => 2 => 3

// Remove first element with shift()
$linkedList->shift();
$linkedList->print(); // 101 => 1 => 99 => 2 => 3

// Remove last element with pop() (returns last Node in Linked List)
$lastNode = $linkedList->pop();
print $lastNode . "\n"; // 3
$linkedList->print(); // 101 => 1 => 99 => 2
$lastNode = $linkedList->pop();
print $lastNode . "\n"; // 2
$linkedList->print(); // 101 => 1 => 99

// Remove node after specific position
$linkedList
    ->append(new Node(11))
    ->append(new Node(12))
    ->append(new Node(13))
    ->append(new Node(14));
$linkedList->print(); // 101 => 1 => 99 => 11 => 12 => 13 => 14

$linkedList->removeNodeAfter(2);
$linkedList->print(); // 101 => 1 => 99 => 12 => 13 => 14
