<?php
namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ProductType;

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
     * @Route("/shop/new", name="create_product")
     * @Route("/shop/{id}/edit", name="edit_product")
     */
    public function productForm(Products $product = null, Request $request, EntityManagerInterface $manager)
    {
        dump($request);
        if(!$product)
        {
            $product = new Products();
        }

        // $form = $this->createFormBuilder($product)
        //     ->add('name')
        //     ->add('image')
        //     ->add('price')
        //     ->add('discountedPrice')
        //     ->add('description')
        //     ->add('type')
        //     ->getForm();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        dump($product);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($product);
            $manager->flush();

            return $this->redirectToRoute('shop_show',['id' => $product->getId()]);
        }

        return $this->render('shop/createproduct.html.twig', [
            'controller_name' => 'ShopController',
            'formProduct' => $form->createView(),
            'editMode' => $product->getId() !== null
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
