<?php

namespace App\Controller;
use App\Repository\StudentRepository   ;
use App\Form\StudentType  ;
use App\Entity\Student  ;
use Doctrine\Persistence\ManagerRegistry ; 
use Symfony\Component\HttpFoundation\Request ; 
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
    #[Route('/students', name: 'list_student')]
    public function liststudent(StudentRepository $repository){
        $students=$repository->findAll();
$sortbymoyenne=$repository->sortbymoyenne();
$topStudents= $repository->topStudent();
        return $this->render("student/liststudent.html.twig",array("tabStudents"=>$students,"tabStudent"=>$sortbymoyenne, 'topStudents'=>$topStudents));
    }
    #[Route('/add_student', name: 'add_student')]
    public function addform(ManagerRegistry $doctrine ,Request $request ,StudentRepository $repository){
       
        $students= new Student();
$form = $this->createForm(StudentType::class,$students);
$form->handleRequest($request);
if($form->isSubmitted()){
$repository->add($students,TRUE);
return $this->redirectToRoute ("list_student");
}
        return $this->renderForm("student/add.html.twig",array("formstudent"=>$form));
    }
}
