<?php

namespace App\Tests\Service;

use App\Exception\CategoryNotFoundException;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use App\Service\BookService;
use PHPUnit\Framework\TestCase;

class BookServiceTest extends TestCase
{

    public function testGetBooksByCategoryNotFound() : void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $categoryRepository->expects($this->once())
            ->method('find')
            ->with(1200)
            ->willThrowException(new CategoryNotFoundException());

        $this->expectException(CategoryNotFoundException::class);

        (new BookService($bookRepository, $categoryRepository))->getBooksByCategory(1200);
    }
}
