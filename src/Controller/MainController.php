<?php

namespace App\Controller;

use App\Entity\Classes;
use App\Entity\Category;

use App\Repository\CategoryRepository;
use App\Repository\ClassesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ClassesRepository $classesRepository): Response
    {
        $classes = $classesRepository->findBy(array(), array('id' => 'ASC'), 5,0);
        $categories = $categoryRepository->findBy(array(), array('id' => 'ASC'), 5,0);

        return $this->render('main/index.html.twig', [
            'classes' => $classes,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/list-of-categories", name="categories_main")
     */
    public function categories(CategoryRepository $categoryRepository): Response
    {
        return $this->render('main/list-of-categories.html.twig', [
            'categories' => $categoryRepository->findAll()
        ]);
    }

    /**
     * @Route("/list-of-classes", name="classes_main")
     */
    public function classes(ClassesRepository $classesRepository): Response
    {
        return $this->render('main/list-of-classes.html.twig', [
            'classes' => $classesRepository->findAll()
        ]);
    }

    /**
     * @Route("/show/course/{slug}", name="show_course_main", methods={"GET"})
     */
    public function course_main(Classes $classes, ClassesRepository $classesRepository): Response
    {
        $otherClasses = $classesRepository->findBy([
            'category' => $classes->getCategory()->getId()
        ]);

        return $this->render('main/show-course.html.twig', [
            'course' => $classes,
            'classes' => $otherClasses
        ]);
    }

    /**
     * @Route("/show/category/{id}", name="show_category_main", methods={"GET"})
     */
    public function category_main(Category $category, ClassesRepository $classesRepository): Response
    {
        $classes = $classesRepository->findBy([
            'category' => $category->getId()
        ]);

        return $this->render('main/show-category.html.twig', [
            'category' => $category,
            'classes' => $classes
        ]);
    }
}
