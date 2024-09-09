<?php

namespace LinkedList;

class LinkedList
{
    public function __construct (private ?Node $head = null, private ?Node $tail = null) {}

    public function __toString(): string {
        return $this->head ?? "Empty Linked List" . "\n";
    }

    public function print(): void {
        echo $this->head . "\n" ?? "Empty Linked List" . "\n";
    }

    // Add Node to start of Linked List
    public function push(Node $n): LinkedList {

        // Empty Linked List
        if ( $this->head === null ) {
            $this->head = $n;
            return $this;
        }

        $n->setNext($this->head);
        $this->head = $n;

        return $this;

    }

    // Append Node to end of Linked List
    public function append(Node $n): LinkedList {

        // Empty Linked List
        if ( $this->head === null ) {
            $this->head = $n;
            $this->tail = $n;
            return $this;
        }

        // Linked List with length 1
        if ( $this->tail === null ) {
            $this->tail = $n;
            return $this;
        }

        $this->tail->setNext($n);
        $this->tail = $n;

        return $this;

    }

    // Add Node after specific position in Linked List
    public function addNodeAfter(Node $n, int $position): LinkedList {

        if ( $this->head === null ) {
            $this->head = $n;
            return $this;
        }

        $nodeAt = $this->head;
        for ( $i = 0; $i < $position; ++$i ) {
            $nodeAt = $nodeAt->getNext();

            if ( $nodeAt === null ) {
                return $this;
            }
        }

        $nodeAfter = $this->head;
        for ( $i = 0; $i < $position + 1; ++$i ) {
            $nodeAfter = $nodeAfter->getNext();

            if ( $nodeAfter === null ) {
                return $this;
            }
        }

        $nodeAt->setNext($n);
        $nodeAt->getNext()->setNext($nodeAfter);

        return $this;

    }

}
