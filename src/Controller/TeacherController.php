<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/Teacher/{name}')]
    public function showTeacher($name)
    {
        return new Response("Bonjour $name");
    }
    #[Route('/Teacher1/{name}')]
    public function showTeacher1($name): Response
    {
        return $this->render('/teacher/showTeacher.html.twig', ['name' => $name]);
    }
    #[Route('/goToIndex')]
    public function goToIndex()
    {
        return $this->forward('App\Controller\StudentController::index');
    }
}
