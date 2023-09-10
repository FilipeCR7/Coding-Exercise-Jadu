<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Util\Checker;

class CheckerController extends AbstractController
{
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('checker.html.twig');
    }

    public function check(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $checker = new Checker();

        $wordForPalindrome = $data['word'] ?? '';
        $wordForAnagram = $data['wordForAnagram'] ?? '';
        $comparison = $data['comparison'] ?? '';
        $phrase = $data['phrase'] ?? '';

        $isPalindrome = $checker->isPalindrome($wordForPalindrome);
        $isAnagram = $checker->isAnagram($wordForAnagram, $comparison);
        $isPangram = $checker->isPangram($phrase);

        return $this->json([
            'isPalindrome' => $isPalindrome,
            'isAnagram' => $isAnagram,
            'isPangram' => $isPangram,
        ]);
    }
}
