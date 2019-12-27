<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('login/index.html.twig', [
            'error' =>  $authenticationUtils->getLastAuthenticationError(),
            'last_username'=> $authenticationUtils->getLastUsername()
        ]);
    }

    /**
     * @Route("/logout",name="logout")
     */
    public function logout()
    {

    }
}
