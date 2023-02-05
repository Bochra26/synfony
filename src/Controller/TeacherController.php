<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher/{name}')]
    public function showTeacher($name)
    {
        return new Response("Bonjour $name");
    }
    #[Route('/teacher2/{name}')]
    public function showTeacher2($name): Response
    {
        return $this->render('/teacher/showTeacher.html.twig', ['name' => $name]);
    }
    #[Route('/goToIndex')]
    public function goToIndex()
    {
        return $this->forward('App\Controller\StudentController::index');
    }
}
