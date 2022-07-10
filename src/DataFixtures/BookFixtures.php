<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $programmingCategory = $this->getReference(CategoryFixtures::Programming_CATEGORY);
        $networkingCategory = $this->getReference(CategoryFixtures::Networking_CATEGORY);


        for($i = 1; $i <= 30; $i++) {
            $manager->persist((new Book())
                ->setTitle("Book " . $i)
                ->setSlug("book-" . $i)
                ->setAuthors(["Author " . $i])
                ->setMeap(false)
                ->setCategories(new ArrayCollection([$programmingCategory, $networkingCategory]))
                ->setImage("https://i.pinimg.com/736x/27/7d/b6/277db6312ed3500bf95d42088fad12d4.jpg")
                ->setPublicationDate(new \DateTime('2020-10-07'))
            );

            $manager->flush();
        }

    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
