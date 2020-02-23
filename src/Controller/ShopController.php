<?php
namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


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
            'products' => $products,
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

        $product = new Products();

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => "Product name",
                    'class' => "form-control"
                ]
            ])
            ->add('image', TextType::class, [
                'attr' => [
                    'placeholder' => "Image url",
                    'class' => "form-control"
                ]
            ])
            ->add('price', TextType::class, [
                'attr' => [
                    'placeholder' => "Product price",
                    'class' => "form-control"
                ]
            ])
            ->add('discountedPrice', TextType::class, [
                'attr' => [
                    'placeholder' => "Product discounted price",
                    'class' => "form-control"
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Product description",
                    'class' => "form-control"
                ]
            ])
            ->add('type', TextType::class, [
                'attr' => [
                    'placeholder' => "Product type",
                    'class' => "form-control"
                ]
            ])
            ->getForm();

        return $this->render('shop/createproduct.html.twig', [
            'controller_name' => 'ShopController',
            'formProduct' => $form->createView()
        ]);
    }

    /**
     * @Route("/shop/{id}", name="shop_show")
     */
    public function show(Products $product)
    {
        return $this->render('shop/show.html.twig', [
            'controller_name' => 'ShopController',
            'product' => $product,
        ]);
    }

}
