# Exemplebackend-classe2

URL : https://github.com/WebDevCF2m2026/exemplebackend-classe2

## Branche main

    git switch main

Exemple de routage

## Branche Entities

Exemple de base de données

    git switch Entities

### Modification de .env

Nous allons suivre [Sym74](https://github.com/WebDevCF2m2026/Symfony-7.4-LTS-Classe2#cr%C3%A9ation-du-fichier-envlocal), mais pas créer de `.env.local`

### Utilisation de MariaDB

Ouvrons le fichier `.env` :

```bash
# dans .env
# Valeur par défaut
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
```

On intervertit les commentaires pour utiliser `MariaDB`

```bash
# dans .env
# Valeur par défaut
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
```

Nous avons utilisé Wamp, il faut l'adapter à notre version locale (plus tard vers le serveur en production)

On ouvre PHPMyAdmin sur MariaDB :

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3307/sym74?serverVersion=11.4.9-MariaDB&charset=utf8mb4"
```

On met les règlages de la base de donnée

## Création de la base de donnée

puis on crée la DB:

    php bin/console doctrine:database:create

    > Created database `sym74` for connection named default


## Création de BlogController

```bash
    php bin/console make:controller BlogController

    > Do you want to generate PHPUnit tests? [Experimental] (yes/no) [no]:
 > yes

 created: src/Controller/BlogController.php
 created: templates/blog/index.html.twig
 created: tests/Controller/BlogControllerTest.php


  Success!


 Next: Open your new controller class and add some pages!
 ```

 Modification du nom et chemin dans `src/Controller/BlogController.php`

 ```php
final class BlogController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
 ```

 Ne pas oublier de faire des `composer update` régulièrement

 ## Création de l'entité Article

 L'entité, c'est la représentation des données (MVC) => Modèle

    Pour créer un article

```bash
    php bin/console make:entity
    > Class name of the entity to create or update (e.g. OrangeGnome):
 > Article
Article

 Add the ability to broadcast entity updates using Symfony UX Turbo? (yes/no) [no]: no
 >

 created: src/Entity/Article.php
 created: src/Repository/ArticleRepository.php

 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 >



  Success!

New property name (press <return> to stop adding fields):
 > ArticleTitle

 Next: When you're ready, create a migration with php bin/console make:migration

 Field type (enter ? to see all types) [string]:
 >


 Field length [255]:
 > 120

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 New property name (press <return> to stop adding fields):
 > ArticleSlug

 Field type (enter ? to see all types) [string]:
 >


 Field length [255]:
 > 124

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

  Add another property? Enter the property name (or press <return> to stop adding fields):
 > ArticleContent

 Field type (enter ? to see all types) [string]:

Field type (enter ? to see all types) [string]:
 > text
text

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 New property name (press <return> to stop adding fields):
 > ArticleDateCreated

 Field type (enter ? to see all types) [string]:
 > datetime_immutable
datetime_immutable

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Article.php

```

## Création de la DB

    php bin/console make:migration

```bash
created: migrations/Version20261125110644.php


  Success!


 Review the new migration then run it with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
 ```

 dans le fichier `migrations/Version20261125110644.php`

# ICI