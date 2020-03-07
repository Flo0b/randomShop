<?php

namespace App\DataFixtures;

use App\Entity\DiscountRules;
use App\Entity\Products;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DiscountRulesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();
        //Créer 3 réducs fakées
        for ($j = 1; $j < 4; $j++) {

            $discount = new DiscountRules();
            $discount->setDiscountPercent($faker->numberBetween(5, 90));

            $manager->persist($discount);
        }
        
        $manager->flush();
    }
}
