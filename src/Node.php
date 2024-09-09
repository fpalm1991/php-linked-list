<?php

namespace LinkedList;

class Node
{
    public function __construct(private $value, private ?Node $next = null) {}

    public function setNext(Node $node): void {
        $this->next = $node;
    }

    public function getNext(): ?Node {
        return $this->next;
    }

    public function __toString(): string {
        return $this->next ? "$this->value => $this->next" : "$this->value";
    }
}