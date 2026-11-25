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

On met les règlages du contact