<?php

namespace App\DataFixtures;

use App\Entity\DiscountRules;
use App\Entity\Products;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES_REFERENCE = 'categs';

    public function load(ObjectManager $manager)
    {
        // $tab = ['Books','Alimentaire','Hi-Tech','Clothes','Cars','Others'];
        // $categs = array();

        // foreach ($tab as &$str) {
        //     $categ = new Category();
        //     $categ->setTitle($str);
        //     $manager->persist($categ);
        //     array_push($categs, $categ);
        // }
        // $manager->flush();

        // $this->addReference(self::CATEGORIES_REFERENCE, $categs);

    }
}
