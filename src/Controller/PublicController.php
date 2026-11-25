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

    // protection de la variable id qui ne peut être qu'un digit {id<\d+>}
    // Autres possibilités pour faire la même chose + clair :
    // #[Route('/articleType/{id}', name: 'public_article_type', requirements: ['id' => '[0-9]+'])]
    // https://symfony.com/doc/7.4/routing.html#parameters-validation
    #[Route('/articleType/{id<\d+>}', name: 'public_article_type',methods: ['GET'])]
    public function articleType(int $id): Response
    {
        // Nous allons envoyer une réponse de type texte en utilisant la classe Response en utilisant
         // la variable $id
        return new Response("<body><h1>Page de l'article Typée en int dont l'id est $id</h1>
        <p>Ne fonctionne qu'avec une variable GET de type numérique !</p><a href='../../'>Retour à l'accueil</a></body>");
    }

    // protection de la variable id qui ne peut être qu'un digit
    // et si pas de variable, 1 par défaut
    #[Route('/articleTypeDefault/{id}', 
        name: 'public_article_type_default', 
        defaults: ['id' => 1], 
        requirements: ['id' => '[1-9][0-9]*'],
        methods: ['GET'])]
    public function articleTypeDefault(int $id): Response
    {
        // Nous allons envoyer une réponse de type texte en utilisant la classe Response en utilisant
        // la variable $id
        return new Response("<body><h1>Page de l'article Typée avec valeur par défaut en int dont l'id est $id</h1>
        <p>Ne fonctionne qu'avec une variable GET de type numérique !<br>
        La valeur par défaut est 1</p><a href='../../'>Retour à l'accueil</a></body>");
    }
}
