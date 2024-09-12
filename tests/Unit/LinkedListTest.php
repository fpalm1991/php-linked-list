<?php declare(strict_types = 1);

use LinkedList\Node;
use LinkedList\LinkedList;


describe('adding to linked list', function() {

    it('adds nodes at the end of a linked list', function() {
        $linkedList = new LinkedList();

        $linkedList
            ->append(new Node(1))
            ->append(new Node(2))
            ->append(new Node(3));

        expect($linkedList->getAsArray())->toBe( [1, 2, 3] );
    });

    it('adds nodes at the beginning of a linked list', function() {
        $linkedList = new LinkedList();

        $linkedList
            ->push(new Node(1))
            ->push(new Node(2))
            ->push(new Node(3));

        expect($linkedList->getAsArray())->toBe( [3, 2, 1] );
    });

    it('adds a node at a specific position in a linked list', function() {
        $linkedList = new LinkedList();

        $linkedList
            ->append(new Node(1))
            ->append(new Node(2))
            ->append(new Node(3))
            ->append(new Node(4))
            ->append(new Node(5))
            ->addNodeAfter(new Node(99), 2);

        expect($linkedList->getAsArray())->toBe( [1, 2, 3, 99, 4, 5]);
    });

    it('adds a node at and when inserting at a specific position and it is the last position in the linked list', function() {
        $linkedList = new LinkedList();

        $linkedList
            ->append(new Node(1))
            ->append(new Node(2))
            ->append(new Node(3))
            ->addNodeAfter(new Node(99), 2);

        expect($linkedList->getAsArray())->toBe( [1, 2, 3, 99]);
    });


});
