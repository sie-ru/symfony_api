<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Model as Model;

#[Route("/api/v1")]
class CategoryController extends AbstractController
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    
    #[Route(path: "/categories", methods: "GET")]
    public function categories() : Response
    {
        return $this->json($this->service->getCategories());
    }


}
