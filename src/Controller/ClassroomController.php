<?php

namespace App\Controller;

use App\Entity\Classroom;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Classroom::class);
        $classrooms=$repo->findAll();
      
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
            'classrooms'=> $classrooms,
        ]);
    }
    #[Route('/deleteClassroom/{id}',name:'classroom_delete')]
    public function deleteClassroom($id,ClassroomRepository $repo){
       $classroom =$repo -> find($id);
       $em =$doctrine ->getManager();
       $em -> remove($classroom);
       $em -> flush();
       $this -> redirectToRoute('app_classroom');
    }
    #[Route('/addClassroom ',name:'classroom_add')]
    public function addClassroom(ClassroomRepository $repo){
       $classroom =new Classroom();
       $classroom -> setUsername('3A19');
       $classroom-> setEmail('3a19@esprit.tn');
       $repo ->save($classroom,true);
     return $this -> redirectToRoute('app_classroom');
    }
    #[Route('/updateClassroom/{id}',name:'classroom_update')]
    public function updateClassroom($id,ClassroomRepository $repo){
       $classroom =$repo -> find($id);
       $classroom -> setUsername('classroom updated');
       $em =$doctrine ->getManager();
       $em->flush();
        return $this -> redirectToRoute('app_classroom');
    }
}
