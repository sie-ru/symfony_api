<?php

namespace App\Service;

use App\Entity\Book;
use App\Exception\CategoryNotFoundException;
use App\Model\BookList;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use App\Response\BookListResponse;

class BookService
{
    private BookRepository $bookRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getBooksByCategory(int $categoryId) : BookListResponse
    {
        $category = $this->categoryRepository->find($categoryId);
        if(is_null($category)) {
            throw new CategoryNotFoundException();
        }

        $books = array_map(
            [$this, 'map'],
            $this->bookRepository->findBooksByCategory($categoryId)
        );

        return new BookListResponse($books);
    }

    private function map(Book $book) : BookList
    {
        return (new BookList())
            ->setId($book->getId())
            ->setTitle($book->getTitle())
            ->setSlug($book->getSlug())
            ->setImage($book->getImage())
            ->setAuthors($book->getAuthors())
            ->setMeap($book->isMeap())
            ->setPublicationDate($book->getPublicationDate()->getTimestamp());
    }
}
