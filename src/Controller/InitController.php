<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InitController
{
    public function number()
    {
        try {
            $number = random_int(0, 100);
        } catch (\Exception $e) {
            echo 'Une erreur '.$e;
        }

        return new Response(
            '<html><body>Djery number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/djery")
     */
    public function djery()
    {
        return new Response('Djery yeah');
    }
}