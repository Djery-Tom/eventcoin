<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index( Request $request , string $theme = 'classic')
    {
        return $this->render('dashboard/index.html.twig', [
            'layout' => $request->query->has('theme') ? $request->query->get('theme') : $theme,
        ]);
    }
}
