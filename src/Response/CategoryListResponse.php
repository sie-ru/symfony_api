<?php

namespace App\Response;

use App\Model\CategoryList;

class CategoryListResponse
{
    private array $items;

    /**
     * @param CategoryList[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CategoryList[]
     */
    public function getItems(): array
    {
        return $this->items;
    }


}
