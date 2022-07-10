<?php

namespace App\Exception;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class CategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Category not fount", Response::HTTP_NOT_FOUND);
    }

}
