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
