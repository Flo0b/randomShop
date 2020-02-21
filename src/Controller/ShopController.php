<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Products;
use App\Repository\ProductsRepository;



class ShopController extends AbstractController
{
    /**
     * @Route("/shop/")
     */
    public function shop(ProductsRepository $repo)
    {

        $products = $repo->findAll();

        return $this->render('shop/shop.html.twig', [
            'controller_name' => 'ShopController',
            'products'=> $products
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('shop/home.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }



    /**
     * @Route("/shop/new", name="shop_create_product")
     */
    public function createProduct(Request $request)
    {
        dump($request);
        return $this->render('shop/createproduct.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }

    /**
     * @Route("/shop/{id}", name="shop_show")
     */
    public function show(Products $product)
    {
        return $this->render('shop/show.html.twig', [
            'controller_name' => 'ShopController',
            'product' => $product
        ]);
    }



}
