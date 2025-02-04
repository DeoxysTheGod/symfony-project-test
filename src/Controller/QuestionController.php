<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
  #[Route('/question/new', name: 'app_question_new')]
  public function new(Request $request, EntityManagerInterface $entityManager): Response
  {
    $question = new Question();

    $form = $this->createForm(QuestionType::class, $question);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      foreach ($question->getChoices() as $choice) {
        $choice->setQuestion($question); // Lier les choix à la question
      }

      $entityManager->persist($question);
      $entityManager->flush();

      return $this->redirectToRoute('app_question_list'); // Redirection après ajout
    }

    return $this->render('question/new.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  #[Route('/questions', name: 'app_question_list')]
  public function list(EntityManagerInterface $entityManager): Response
  {
    $questions = $entityManager->getRepository(Question::class)->findAll();

    return $this->render('question/list.html.twig', [
      'questions' => $questions,
    ]);
  }

  #[Route('/question/{id}', name: 'app_question_show')]
  public function show(Question $question): Response
  {
    return $this->render('question/show.html.twig', [
      'question' => $question,
    ]);
  }
}
