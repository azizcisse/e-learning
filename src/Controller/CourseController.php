<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil.html.twig');
    }

    /**
     * @Route("/courses", name="app_courses")
     */
    public function courses(FormationRepository $formationRepository): Response
    {
        $courses = $formationRepository->findAll();
        return $this->render('course/index.html.twig', [
            'courses' => $courses,
        ]);
    }

    /**
     * @Route("/single-course/{id}", name="app_single_course")
     */
    public function single_course(Request $request, Formation $formation, FormationRepository $formationRepository): Response
    {
        return $this->render('course/single_course.html.twig', [
            'course' => $formationRepository->findOneBy(['formation' => $formation]),
        ]);
    }
}
