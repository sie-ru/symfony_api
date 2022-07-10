<?php

namespace App\Response;

use App\Model\BookList;

class BookListResponse
{
    private array $items;

    /** @param BookList[] $items */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /** @return BookList[] */
    public function getItems(): array
    {
        return $this->items;
    }


}
