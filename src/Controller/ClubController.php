<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
    #[Route('/formations', name: 'app_formation')]
    public function formations(){
         $var1= '3A29';
         $var2= 'i23';
          $formations = array(
             array('ref' => 'form147', 'Titre' => 'Formation Symfony
4','Description'=>'pratique',
                 'date_debut'=>'12/06/2020', 'date_fin'=>'19/06/2020',
                 'nb_participants'=>19) ,
             array('ref'=>'form177','Titre'=>'Formation SOA' ,
                 'Description'=>'theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020',
                 'nb_participants'=>80),
             array('ref'=>'form178','Titre'=>'Formation Angular' ,
                 'Description'=>'theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020',
                 'nb_participants'=>12));
        return $this->render("club/list.html.twig",array("c1"=>$var1,"c2"=>$var2,'tab_formations'=>$formations));
    }
    #[Route('/reservation', name: 'app_reservation')]
    public function reservation(){
        return new  Response("nouvelle page");
}
}