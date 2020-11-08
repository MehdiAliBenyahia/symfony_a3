<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ClassesRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(
        CategoryRepository $categoryRepository,
        ClassesRepository $classesRepository,
        UserRepository $userRepository
    ): Response
    {
        $countMeThis1 = $categoryRepository->findAll();
        $countMeThis2 = $classesRepository->findAll();
        $countMeThis3 = $userRepository->findAll();


        $statCategories = count($countMeThis1);
        $statClasses = count($countMeThis2);
        $statUsers = count($countMeThis3);

        return $this->render('admin/index.html.twig', [
            'classes' => $statClasses,
            'categories' => $statCategories,
            'users' => $statUsers
        ]);
    }
}
