<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
      // dd($authenticationUtils->getLastUsername());
      //get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUserName = $authenticationUtils->getLastUsername();
      return $this->render('auth/index.html.twig', [
          'last_username' => $lastUserName,
          'error' => $error
      ]);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response {
      return $this->render('login.html.twig', [
        'user' => null
      ]);
    }
}
