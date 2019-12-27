<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request , UserPasswordEncoderInterface $encoder)
    {
        $account = new Account();

        $form = $this->createForm(RegistrationType::class,$account);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($account,$account->getPassword());
            $account->setPassword($hash);

            $account->setBalance(0);
            $account->setCreatedAt(new \DateTime());

            $this->manager ->persist($account);
            $this->manager ->flush();

           return $this->redirectToRoute('login');
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'countries'=>[
                    'Cameroun',
                    'Guinne' ,
                    'France',
                ]
        ]);
    }
}
