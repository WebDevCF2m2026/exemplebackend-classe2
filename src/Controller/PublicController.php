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
            // variable par défaut
            'controller_name' => 'Homepage',
            // devient une variable pour le template
            // en l'ajoutant explicitement au tableau
            'my_name' => $name,
            // passage du nom de la page
            'titre' => 'Homepage',
            // attaque XSS sur public/index.html.twig
            'XSS' => "<script> alert('XSS!'); </script>",
            // script voulu passé dans le template
            'my_script' => "<script> const aujourdHui = new Date();
document.write(aujourdHui.toLocaleString('fr-FR'));
 </script>",

        ]);
    }


    // création de la méthode contact sans routing
    // routing dans config/routes.yaml
    public function contact(): Response
    {
        // Nous allons envoyer une réponse de type texte en utilisant la classe Response (html basique) <body> est présent pour la bare de débug
        return new Response('<body><h1>Page de contact</h1><a href="./">Retour à l\'accueil</a></body>');
    }

    // Méthode article(îd) avec route et variable get
    #[Route('/article/{id}', name: 'public_article')]
    public function article($id): Response
    {
        // Nous allons envoyer une réponse de type texte en utilisant
        // la classe Response en utilisant la variable $id
        return new Response("<body><h1>Page de l'article dont l'id est $id</h1>
        <a href='../'>Retour à l'accueil</a></body>");
    }
}
