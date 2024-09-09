<?php

require_once __DIR__ . '/vendor/autoload.php';

use LinkedList\Node;
use LinkedList\LinkedList;

// Simple implementation
$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);

$node1->setNext($node2);
$node2->setNext($node3);


// Advanced implementation
$linkedList = new LinkedList();

$linkedList->append(new Node(1))->append(new Node(2))->push(new Node(3));
$linkedList->print(); // 3 => 1 => 2
$linkedList->addNodeAfter(new Node(99), 1);
$linkedList->print(); // 3 => 1 => 99 => 2
