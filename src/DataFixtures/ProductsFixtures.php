<?php

namespace App\DataFixtures;

use App\Entity\DiscountRules;
use App\Entity\Products;
use App\Entity\Category;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductsFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();

        $tab = ['Books','Alimentaire','Hi-Tech','Clothes','Cars','Others'];
        $categs = array();

        foreach ($tab as &$str) {
            $categ = new Category();
            $categ->setTitle($str);
            $manager->persist($categ);
            array_push($categs, $categ);
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
            $product->setCategory($categs[random_int(0,5)]);

            $manager->persist($product);
        }



        $manager->flush();
    }


}
