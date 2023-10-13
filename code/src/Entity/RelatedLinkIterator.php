<?php

namespace Moris\Code\Entity;

class RelatedLinkIterator implements EntityIteratorInterface
{
    private int $current;
    private array $list = [];

    public function __construct()
    {
        $this->current = 0;
    }

    public function current(): mixed
    {
        return $this->list[$this->current];
    }

    public function next(): void
    {
        ++$this->current;
    }

    public function key(): int
    {
        return $this->current;
    }

    public function valid(): bool
    {
        return isset($this->array[$this->current()]);
    }

    public function rewind(): void
    {
        $this->current = 0;
    }

    public function addItem(EntityInterface $item): self
    {
        $this->list[] = $item;
        return $this;
    }

    public function isEmpty(): bool
    {
        return empty($this->list);
    }
    public function getList(): array
    {
        return $this->list;
    }
}