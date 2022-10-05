<?php

namespace App\Controller;
use App\Repository\StudentRepository   ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/etudiant', name: 'etudiants')]

    public function etudiants()
    {
    return new Response("Bonjour mes etudiants !");
    }
    #[Route('/students', name: 'app_student')]
    public function liststudent(StudentRepository $repository){
        $students=$repository->findAll();

        return $this->render("student/liststudent.html.twig",array("tabStudents"=>$students));
    }
}
