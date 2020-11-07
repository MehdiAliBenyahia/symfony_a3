<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Classes;

use App\Repository\CategoryRepository;
use App\Repository\ClassesRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $today = new \DateTime();

        $categories = [
            1  => ['label' => 'Catégorie 1'],
            2  => ['label' => 'Catégorie 2'],
            3  => ['label' => 'Catégorie 3'],
            4  => ['label' => 'Catégorie 4'],
            5  => ['label' => 'Catégorie 5'],
            6  => ['label' => 'Catégorie 6'],
            7  => ['label' => 'Catégorie 7'],
            8  => ['label' => 'Catégorie 8'],
            9  => ['label' => 'Catégorie 9'],
            10 => ['label' => 'Catégorie 10']
        ];

        for ($i = 1; $i <= count($categories); $i++) {
            $category = new Category();
            $category->setLabel($categories[$i]["label"]);
            $manager->persist($category);
        }
        $manager->flush();

        $categoriesRepository = $manager->getRepository('App:Category')->findAll();

        $classes = [
            1 => [
                'title' => 'Cours HTML5',
                'description' => $lorem,
                'slug' => 'cours-html-5',
                'date_created' => $today,
                'category' => $categoriesRepository[0]
            ],
            2 => [
                'title' => 'Cours CSS3',
                'description' => $lorem,
                'slug' => 'cours-css-3',
                'date_created' => $today,
                'category' => $categoriesRepository[1]
            ],
            3 => [
                'title' => 'Cours C++',
                'description' => $lorem,
                'slug' => 'cours-c++',
                'date_created' => $today,
                'category' => $categoriesRepository[2]
            ],
            4 => [
                'title' => 'Cours Python',
                'description' => $lorem,
                'slug' => 'cours-python',
                'date_created' => $today,
                'category' => $categoriesRepository[3]
            ],
            5 => [
                'title' => 'Cours Laravel',
                'description' => $lorem,
                'slug' => 'cours-laravel',
                'date_created' => $today,
                'category' => $categoriesRepository[4]
            ],
            6 => [
                'title' => 'Cours VueJS',
                'description' => $lorem,
                'slug' => 'cours-vuejs',
                'date_created' => $today,
                'category' => $categoriesRepository[5]
            ],
            7 => [
                'title' => 'Cours React Native',
                'description' => $lorem,
                'slug' => 'cours-react-native',
                'date_created' => $today,
                'category' => $categoriesRepository[6]
            ],
            8 => [
                'title' => 'Cours PHP Amateur',
                'description' => $lorem,
                'slug' => 'cours-php-amateur',
                'date_created' => $today,
                'category' => $categoriesRepository[7]
            ],
            9 => [
                'title' => 'Cours PHP Expert',
                'description' => $lorem,
                'slug' => 'cours-php-expert',
                'date_created' => $today,
                'category' => $categoriesRepository[8]
            ],
            10 => [
                'title' => 'Cours AngularJS',
                'description' => $lorem,
                'slug' => 'cours-angularjs',
                'date_created' => $today,
                'category' => $categoriesRepository[9]
            ],
            11 => [
                'title' => 'Cours Swift',
                'description' => $lorem,
                'slug' => 'cours-swift',
                'date_created' => $today,
                'category' => $categoriesRepository[0]
            ],
            12 => [
                'title' => 'Cours ReactJS',
                'description' => $lorem,
                'slug' => 'cours-reactjs',
                'date_created' => $today,
                'category' => $categoriesRepository[1]
            ],
            13 => [
                'title' => 'Cours Gatsby',
                'description' => $lorem,
                'slug' => 'cours-gatsby',
                'date_created' => $today,
                'category' => $categoriesRepository[2]
            ],
            14 => [
                'title' => 'Cours NodeJS',
                'description' => $lorem,
                'slug' => 'cours-nodejs',
                'date_created' => $today,
                'category' => $categoriesRepository[4]
            ],
            15 => [
                'title' => 'Cours CMS',
                'description' => $lorem,
                'slug' => 'cours-cms',
                'date_created' => $today,
                'category' => $categoriesRepository[3]
            ]
        ];

        for ($i = 1; $i <= count($classes); $i++) {
            $course = new Classes();
            $course->setTitle($classes[$i]["title"]);
            $course->setDescription($classes[$i]["description"]);
            $course->setSlug($classes[$i]["slug"]);
            $course->setDateCreated($classes[$i]["date_created"]);
            $course->setCategory($classes[$i]["category"]);
            $manager->persist($course);
        }
        $manager->flush();
    }
}
