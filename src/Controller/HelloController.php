<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
  private array $messages = [
    ['message' => 'Hello', 'created' => '2022/10/12'],
    ['message' => 'Hi', 'created' => '2022/08/12'],
    ['message' => 'Bye', 'created' => '2021/04/12'],
  ];


  // Route with regex validation from PHP 8 annotations 

  #[Route('/{limit<\d+>?3}', name: 'app_index')]
  public function index(int $limit): Response
  {
    return $this->render("hello/index.html.twig", [
      'messages' => $this->messages,
      'limit' => $limit
    ]);
  }


  // Route with regex validation so the app doesn't crash (shows 404 when using a string instead of an int) 


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
