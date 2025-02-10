<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocaleController extends AbstractController
{
    #[Route('/change-locale/{locale}', name: 'change_locale', methods: ['POST'])]
    public function changeLocale(string $locale, SessionInterface $session, Request $request): JsonResponse
    {
        $availableLocales = ['fr', 'en']; // Ajoutez les langues disponibles

        if (!in_array($locale, $availableLocales)) {
            return new JsonResponse(['error' => 'Invalid locale'], Response::HTTP_BAD_REQUEST);
        }

        $session->set('_locale', $locale);

        return new JsonResponse(['message' => 'Locale changed successfully']);
    }
}
