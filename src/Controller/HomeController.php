<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/mentions-legales', name: 'mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('legal/mentions_legales.html.twig');
    }

    #[Route('/tous-droits-reserves', name: 'tous_droits_reserves')]
    public function tousDroitsReserves(): Response
    {
        return $this->render('legal/tous_droits_reserves.html.twig');
    }
}
