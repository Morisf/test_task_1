<?php

namespace Moris\Code\Services;

use Moris\Code\Database\Connection;
use Moris\Code\Entity\EntityIteratorInterface;
use Moris\Code\Entity\RelatedLink;
use Moris\Code\Entity\RelatedLinkIterator;

class RelatedLinks
{
    public function __construct(private Connection $dbConnection)
    {
    }

    public function getRelatedLinks(string $domain, int $limit): EntityIteratorInterface
    {
        $stmt = $this->dbConnection->conn()->prepare("
            select prl.id, prl.related_link, prl.created, prl.updated from parking_related_link prl
            left join parking.parking_domain_has_related_link pdhrl on prl.id = pdhrl.related_link_id
            left join parking.parking_domain pd on pdhrl.domain_id = pd.id
            where pd.domain_name_ace = ?
            limit ?
        ");

        $stmt->bind_param("si", $domain, $limit);

        $stmt->execute();

        $result = $stmt->get_result();

        $items = new RelatedLinkIterator();

        if (!$result->num_rows) {
            return $items;
        }

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $items->addItem(
                (new RelatedLink())
                    ->setId($item['id'])
                    ->setRelatedLink($item['related_link'])
                    ->setCreated(new \DateTime($item['created']))
                    ->setUpdated(new \DateTime($item['updated']))
            );
        }

        return $items;
    }
}