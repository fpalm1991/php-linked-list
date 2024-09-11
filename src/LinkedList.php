<?php declare(strict_types = 1);

namespace LinkedList;

class LinkedList {
    public function __construct (
        private ?Node $head = null,
        private ?Node $tail = null,
    ) {}

    public function __toString(): string {
        return (string) $this->head ?? "Empty Linked List" . "\n";
    }

    private function getNodeAt(int $position): ?Node {
        $nodeAt = $this->head;

        for ( $i = 0; $i < $position; ++$i ) {
            $nodeAt = $nodeAt->getNext();

            if ( $nodeAt === null ) {
                return null;
            }
        }

        return $nodeAt;
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
                $this->append($n); // Append new node at end of Linked List if there is no other Node after $nodeAt
                return $this;
            }
        }

        $nodeAt->setNext($n);
        $nodeAt->getNext()->setNext($nodeAfter);

        return $this;
    }

    // Remove first element from Linked List
    public function shift(): LinkedList {

        // Empty Linked List
        if ( $this->head === null ) {
            return new LinkedList();
        }

        // LinkedList with length 1
        if ( $this->head->getNext() === null ) {
            return new LinkedList();
        }

        $this->head = $this->head->getNext();

        return $this;
    }

    // Remove last element form Linked List
    public function pop(): Node {

        // Empty Linked List
        if ( $this->head === null ) {
            throw new \UnderflowException("Cannot pop empty linked list");
        }

        // Linked List with length 1
        if ( $this->head->getNext() === null ) {
            $this->head = null;
            $this->tail = null;

            return $this->head;
        }

        // Get second last element
        $secondLastNode = $this->head;
        while ( $secondLastNode->getNext() !== null ) {
            $secondLastNode = $secondLastNode->getNext();
            $nextNode = $secondLastNode->getNext();

            if ( $nextNode->getNext() === null ) {
                break;
            }
        }

        $lastNode = $secondLastNode->getNext();

        $this->tail = $secondLastNode;
        $this->tail->unsetNext();

        return $lastNode;
    }

    public function removeNodeAfter(int $position): LinkedList {

        if ( $this->head === null ) {
            return new LinkedList();
        }

        if ( $this->head->getNext() === null ) {
            return new LinkedList();
        }

        $nodeAt = $this->getNodeAt($position);

        /*
        $nodeAt = $this->head;
        for ( $i = 0; $i < $position; ++$i ) {
            $nodeAt = $nodeAt->getNext();

            if ( $nodeAt === null ) {
                return $this;
            }
        }
        */

        $nodeAfter = $this->head;
        for ( $i = 0; $i < $position + 1; ++$i ) {
            $nodeAfter = $nodeAfter->getNext();

            if ( $nodeAfter === null ) {
                return $this;
            }
        }

        if ( $nodeAfter->getNext() === null ) {
            throw new \UnderflowException("Cannot remove since linked list is too short.");
        }

        $nodeAt->setNext($nodeAfter->getNext());

        return $this;
    }


}
