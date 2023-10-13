<?php

namespace Moris\Code\Entity;

interface EntityIteratorInterface extends \Iterator
{
    public function addItem(EntityInterface $item): self;
}