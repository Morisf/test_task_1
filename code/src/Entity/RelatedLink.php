<?php

namespace Moris\Code\Entity;

class RelatedLink implements EntityInterface
{
    private ?int $id;
    private string $related_link;
    private \DateTime $created;
    private \DateTime $updated;

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'related_link' => $this->getRelatedLink(),
            'created' => $this->getCreated()->format('Y-m-d'),
            'updated' => $this->getUpdated()->format('Y-m-d'),
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): RelatedLink
    {
        $this->id = $id;
        return $this;
    }

    public function getRelatedLink(): string
    {
        return $this->related_link;
    }

    public function setRelatedLink(string $related_link): RelatedLink
    {
        $this->related_link = $related_link;
        return $this;
    }

    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTime $created): RelatedLink
    {
        $this->created = $created;
        return $this;
    }

    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    public function setUpdated(\DateTime $updated): RelatedLink
    {
        $this->updated = $updated;
        return $this;
    }
}