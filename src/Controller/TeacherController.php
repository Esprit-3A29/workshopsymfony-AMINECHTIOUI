<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }

    #[Route('/teacher/{name}', name: 'teachers')]

    public function teacher($name)
    {
    return new Response("Bonjour ".$name);
    }


    #[Route('/showteacher/{name}', name: 'show_teacher')]

public function showTeacher($name)
{
return $this->render("teacher/showTeacher.html.twig",$name);
}
}
