<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        "Hello", "Hi", "Bye", "Welcome"
    ];

    /**
     * Route with regex validation from PHP 8 annotations 
     */
    #[Route('/{limit<\d+>?3}', name: 'app_index')]

    public function index(int $limit): Response
    {
        return $this->render("hello/index.html.twig", [
            'messages' => implode(',', array_slice($this->messages, 0, $limit))
        ]);
    }

    /**
     * Route with regex validation so the app doesn't crash (shows 404 when using a string instead of an int) 
     */

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne($id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );
    }
}
