<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const Programming_CATEGORY = 'php';
    public const Networking_CATEGORY = 'java';


    public function load(ObjectManager $manager): void
    {
        $categories = [
            self::Programming_CATEGORY => (new Category())->setTitle('Programming')->setSlug('programming'),
            self::Networking_CATEGORY => (new Category())->setTitle('Networking')->setSlug('networking'),
        ];

        foreach ($categories as $category) {
            $manager->persist($category);
        }

        $manager->flush();

        foreach ($categories as $code => $category) {
            $this->addReference($code, $category);
        }
    }
}
