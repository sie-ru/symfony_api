<?php

namespace App\Service;

use App\Entity\Category;
use App\Model\CategoryList;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use App\Response\CategoryListResponse;
use Doctrine\Common\Collections\Criteria;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories() : CategoryListResponse
    {
        $categories = $this->categoryRepository->findBy([], ['title' => Criteria::ASC]);

        $items = array_map(
            fn(Category $category) => new CategoryList(
                $category->getId(),
                $category->getTitle(),
                $category->getSlug()
            ),
            $categories
        );

        return new CategoryListResponse($items);
    }
}
