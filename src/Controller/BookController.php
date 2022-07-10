<?php

namespace App\Controller;

use App\Exception\CategoryNotFoundException;
use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/v1")]
class BookController extends AbstractController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    #[Route("/categories/{categoryId}/books")]
    public function booksByCategory(int $categoryId) : Response
    {
        try {
            return $this->json($this->bookService->getBooksByCategory($categoryId));
        } catch (CategoryNotFoundException $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }

}
