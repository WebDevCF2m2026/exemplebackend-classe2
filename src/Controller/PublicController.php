<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PublicController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        // variable locale
        $name = "Pitz Michaël";

        return $this->render('public/index.html.twig', [
            'controller_name' => 'Homepage',
            // devient une variable pour le template
            // en l'ajoutant explicitement au tableau
            'my_name' => $name,
        ]);
    }
}
