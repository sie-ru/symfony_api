<?php

namespace App\Tests\Controller;

use App\Controller\CategoryController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{

    public function testCategories() : void
    {
        $client = static::createClient();
        $client->request("GET", "/api/categories");
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(__DIR__ . '/responses/CategoryControllerTest_testCategories.json', $responseContent);
    }
}
