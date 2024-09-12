<?php declare(strict_types=1);

namespace LinkedList;

class Node {
    public function __construct(private $value, private ?Node $next = null) {}

    public function setNext(Node $node): void {
        $this->next = $node;
    }

    public function unsetNext(): void {
        $this->next = null;
    }

    public function getNext(): ?Node {
        return $this->next;
    }

    public function getValue(): mixed {
        return $this->value;
    }

    public function __toString(): string {
        return $this->next ? "$this->value => $this->next" : "$this->value";
    }
}