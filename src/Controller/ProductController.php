<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/liste/{var}', name: 'liste_product')]

public function listeProduct($var)
{
return new Response("Hello !".$var);
}



#[Route('/show', name: 'show_product')]

public function showProduct()
{
return $this->render("product/show.html.twig");
}

}