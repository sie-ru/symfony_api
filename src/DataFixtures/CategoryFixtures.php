<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new Category())->setTitle('PHP')->setSlug('php'));
        $manager->persist((new Category())->setTitle('Java')->setSlug('java'));
        $manager->persist((new Category())->setTitle('C#')->setSlug('c-sharp'));
        $manager->persist((new Category())->setTitle('NodeJS')->setSlug('nodejs'));
        $manager->persist((new Category())->setTitle('Python')->setSlug('python'));
        $manager->persist((new Category())->setTitle('C++')->setSlug('cpp'));
        $manager->persist((new Category())->setTitle('Linux')->setSlug('linux'));
        $manager->persist((new Category())->setTitle('HTML')->setSlug('html'));
        $manager->persist((new Category())->setTitle('JavaScript')->setSlug('javascript'));

        $manager->flush();
    }
}
