<?php

namespace App\Controller;
use App\Repository\ClassroomRepository   ;
use App\Form\ClassroomType  ;
use App\Entity\Classroom  ;
use Doctrine\Persistence\ManagerRegistry ; 
use Symfony\Component\HttpFoundation\Request ; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    
    #[Route('/class', name: 'app_class')]
    public function listclass(ClassroomRepository $repository){
        $class=$repository->findAll();

        return $this->render("classroom/listclass.html.twig",array("tabclass"=>$class));
    }
    #[Route('/add_class', name: 'add_class')]
    public function addform(ManagerRegistry $doctrine ,Request $request){
       
        $class= new Classroom;
$form = $this->createForm(ClassroomType::class,$class);
$form->handleRequest($request);
if($form->isSubmitted()){
$em = $doctrine->getManager();
$em->persist($class);
$em->flush();
return $this->redirectToRoute ("tabclass");

}
        return $this->renderForm("classroom/add.html.twig",array("formClassroom"=>$class));
    }
    #[Route('/update_class', name: 'update_class')]
    public function updateform(ManagerRegistry $doctrine ,Request $request){
       
        $class= $repository->find($id);
$form = $this->createForm(ClassroomType::class,$class);
$form->handleRequest($request);
if($form->isSubmitted()){
$em = $doctrine->getManager();
$em->flush();
return $this->redirectToRoute ("tabclass");

}
        return $this->renderForm("classroom/update.html.twig",array("formClassroom"=>$class));
    }
    #[Route('/removeform/{id}', name: 'remove')]
    public function remove(ManagerRegistry $doctrine,$id , ClassroomRepository $repository  ){
       
       $class = $repository->find($id);
       $em = $doctrine->getManager();
       $em->remove($class);
       $em->flush() ; 
        return $this->redirectToRoute("tabclass");
    }
   }
