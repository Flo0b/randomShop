<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Products;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 1; $i < 10;$i++)
        {
            $product = new Products();
            $product->setName("Produit n°$i")->setPrice(mt_rand(1,1000))->setType("Type du produit n°$i")->setImage("https://placehold.it/400x300");
            $product->setDiscountedPrice(mt_rand(0,$product->getPrice()));
            $manager->persist($product);
        }
        $manager->flush();
    }
}
