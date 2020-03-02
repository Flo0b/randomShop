<?php

namespace App\DataFixtures;

use App\Entity\DiscountRules;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();
        //Créer 3 réducs fakées
        for ($j = 1; $j < 4; $j++) {
            $cond = $faker->numberBetween(1, 1000);

            $discount = new DiscountRules();
            $discount->setDiscountPercent($faker->numberBetween(5, 50))->setRuleExpression("product.price >= $cond");

            $manager->persist($discount);
        }


        //Créer 9 produits fakées
        for ($i = 1; $i < 10; $i++) {
            $product = new Products();
            $product->setName($faker->word)
                ->setPrice(mt_rand(1, 1000))
                ->setType($faker->randomElement(array('Autres', 'Tech', 'Fun', 'Sport')))
                ->setImage("https://source.unsplash.com/random/400x300/?product?r=$i")
                ->setDescription($faker->paragraph());
            $product->setDiscountedPrice(mt_rand(0, $product->getPrice()));
            // $discounts = $manager->getRepository(DiscountRules::class);
            // foreach($discounts as $d)
            // {
            //     if ($product->getPrice() >= $cond) {
            //         $product->addDiscountRule($discount);
            //     }
            // }

            $manager->persist($product);
        }
        $manager->flush();
    }
}
