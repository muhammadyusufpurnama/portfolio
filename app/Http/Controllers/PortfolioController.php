<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class PortfolioController extends Controller
{
    public function index()
    {
        // Data untuk bagian Intro
        $intro = [
            'name' => 'Hi, I\'m Yusuf',
            'job_title' => 'Junior Developer',
            'description' => 'Hello, I am interested in web development using Laravel and MySQL as a database, mobile app development using Kotlin, and data science using Google Colab tools. I also have a basic understanding of website penetration testing using Burp Suite tools.',
            'avatar' => 'images/yusufPortfolio.png',
        ];

        // Data untuk bagian Experience
        $experiences = [
            [
                'year' => '2023',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'Learning Web programming',
                'company' => '10 Nopember Institute of Technology',
                'description' => 'Learned and mastered the basics of web development,
                starting from creating HTML styling with CSS and logic using JavaScript, and connecting it to MySQL as a database for back-end functions.',
            ],
            [
                'year' => '2023',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'FrontEnd Developer',
                'company' => 'Name Company',
                'description' => 'Learned and mastered the basics of front-end development, starting from identifying user needs to designing effective application layouts for novice users using UI-UX knowledge.',
            ],
            [
                'year' => '2024',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'BackEnd Developer',
                'company' => '10 Nopember Institute of Technology',
                'description' => 'Learned and mastered the basics of back-end development, starting from learning entity relationship diagrams to database administration, where databases are managed to be structured and organized, making it easier to search, store, update, and delete data.',
            ],
            [
                'year' => '2024',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'DevOps Engineer',
                'company' => '10 Nopember Institute of Technology',
                'description' => 'Learned and mastered DevOps practices, where implementing CI/CD practices for development automation and at the same time also ensuring the continuity of an application',
            ],
            [
                'year' => '2025',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'Mobile App Developer',
                'company' => '10 Nopember Institute of Technology',
                'description' => 'Learned and mastered application development practices, using the Flutter framework and Firebase as a database, I developed a mobile application.',
            ],
            [
                'year' => '2025',
                'icon' => 'fa-solid fa-school-flag',
                'job' => 'IT Security Engineer',
                'company' => '10 Nopember Institute of Technology',
                'description' => 'Learned and mastered the basics of website penetration, using Burp Suite tools, to find vulnerabilities in a web application.',
            ],
        ];

        // Data untuk bagian Skill
        $skills = [
            [
                'icon' => 'fa-brands fa-css3-alt',
                'name' => 'CSS',
                'description' => 'Master Cascading Style Sheets (CSS) to create responsive, aesthetic, and consistent user interface designs across various devices. Able to apply styling, layout (Flexbox, Grid), and animation for an optimal user experience.',
            ],
            [
                'icon' => 'fa-brands fa-html5',
                'name' => 'HTML5',
                'description' => 'Proficient in HyperText Markup Language (HTML5) to create semantic and standards-compliant web page structures. Strong understanding of HTML5 elements, forms, multimedia, and basic SEO.',
            ],
            [
                'icon' => 'fa-brands fa-js',
                'name' => 'Javascript',
                'description' => 'Proficient in JavaScript for developing interactivity and dynamic functionality on the client side (frontend). Mastery of JavaScript fundamentals, DOM manipulation, asynchronous operations, and understanding of modern frameworks/libraries.',
            ],
            [
                'icon' => 'fa-brands fa-laravel',
                'name' => 'Laravel',
                'description' => 'Able to develop Model-View-Controller (MVC) web applications using the PHP Laravel framework. Experienced in routing, Eloquent ORM, blade templating, authentication, database migration, and testing.',
            ],
            [
                'icon' => 'fa-brands fa-php',
                'name' => 'PHP',
                'description' => 'Proficient in PHP as a server-side programming language for building web application business logic. Experienced in backend development, database interaction, API development, and session handling.',
            ],
            [
                'icon' => 'fa-brands fa-android',
                'name' => 'Kotlin',
                'description' => 'Experienced in developing Android (native) applications using the Kotlin programming language. Able to design UI/UX, manage activity lifecycles, store data using Firebase, and integrate APIs.',
            ],
            [
                'icon' => 'fa-brands fa-python',
                'name' => 'Python',
                'description' => 'Proficient in Python for various purposes, including web development (with frameworks such as Django/Flask), data analysis, automation scripting, and basic machine learning. Possesses a strong understanding of data structures and algorithms.',
            ],
            [
                'icon' => 'fa-solid fa-database',
                'name' => 'MySQL',
                'description' => 'Proficient in managing and interacting with relational databases using MySQL. Able to design database schemas, write complex queries (CRUD), optimize queries, and ensure data integrity.',
            ],
            [
                'icon' => 'fab fa-java',
                'name' => 'Java',
                'description' => 'Proficient in Java for large-scale application development, both desktop and mobile (Android). Possesses an understanding of OOP concepts, multi-threading, and the Java ecosystem.',
            ],
            [
                'icon' => 'fa-brands fa-figma',
                'name' => 'Figma',
                'description' => 'Proficient in using Figma as a collaborative cloud-based UI/UX design tool. Able to create wireframes, mockups, interactive prototypes, and consistent design systems. Experienced in real-time collaboration with teams, conducting user testing, and efficiently delivering design assets to developers. Strong understanding of the principles of intuitive and engaging user interface design.',
            ],
        ];

        // Data untuk bagian Project
        $projects = [
            [
                'id' => 1,
                'images' => [
                    'images/Logo.gif',
                    'images/adminRole.png',
                    'images/userRole.png',
                ],
                'name' => 'HangNama Car Rental',
                'description' => 'Creating a Full Stack Application Project for Web Programming Course with Multi-Role Accounts',
                'job' => 'FullStack',
                'time' => '2023/02/05-2023/06/10',
                'link' => 'https://muhammadyusufpurnama.web.id/portofolio/public/project1',
            ],
            [
                'id' => 2,
                'images' => [
                    'images/WIUI1.png',
                    'images/WIUI2.png',
                ],
                'name' => 'Wedding invitation UI',
                'description' => 'Create a simple UI for wedding invitations with reservations using a spreadsheet database.',
                'job' => 'Front-End',
                'time' => '2023/08/25-2023/12/12',
                'link' => 'https://muhammadyusufpurnama.web.id/portofolio/public/project2',
            ],
            [
                'id' => 3,
                'images' => [
                    'images/Logo PasarTani 2.0.png',
                    'images/PasarTani UI.png',
                    'images/PT3.png',
                ],
                'name' => 'Pasar Tani Mobile App',
                'description' => 'Online Shopping Application for agricultural products transaction.',
                'job' => 'Mobile App Developer',
                'time' => '2025/05/19-2025/06/26',
                'link' => 'https://github.com/anisaideliaa/FPTekberGroup3',
            ],
            [
                'id' => 4,
                'images' => [
                    'images/SK1.png',
                    'images/SK2.png',
                ],
                'name' => 'SiKilap',
                'description' => 'creating a mobile application for a car wash on-call business service',
                'job' => 'Mobile App Developer',
                'time' => '2025/02/25-2025/06/26',
                'link' => 'https://github.com/zicorociz/ppplkelompok7',
            ],
            [
                'id' => 5,
                'images' => [
                    'images/SK1.png',
                    'images/SK2.png',
                ],
                'name' => 'SiKilap',
                'description' => 'creating a mobile application for a car wash on-call business service',
                'job' => 'Mobile App Developer',
                'time' => '2025/02/25-2025/06/26',
                'link' => 'https://github.com/zicorociz/ppplkelompok7',
            ],
        ];

        // Data untuk bagian Contact
        $contact = [
            'phone' => '+62 859-4341-6361',
            'email' => 'muhammadyusufpurnamacollege@gmail.com',
            'instagram' => '@muhammad_yusufpurnama',
        ];

        $feedbacks = Feedback::latest()->get();

        return view('portfolio.index', compact('intro', 'experiences', 'skills', 'projects', 'contact', 'feedbacks'));
    }
}
