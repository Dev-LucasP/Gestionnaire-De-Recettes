# Projet Laravel de Gestion de Recettes

Ce projet est une application web de gestion de recettes développée avec le framework Laravel. Il permet aux utilisateurs de créer, modifier et consulter des recettes, ainsi que de gérer les ingrédients nécessaires.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP
- Composer
- npm
- MySQL ou un autre système de gestion de base de données compatible

## Installation

1. Clonez le dépôt du projet :

    ```bash
    git clone https://gitlab.univ-artois.fr/lucas_perez/les-recettes-de-mamylens.git
    cd nom-du-projet
    ```

2. Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```

3. Installez les dépendances JavaScript avec npm :

    ```bash
    npm install
    ```

4. Copiez le fichier `.env.example` en `.env` et configurez vos variables d'environnement, notamment la connexion à la base de données :

    ```bash
    cp .env.example .env
    ```

5. Générez la clé de l'application :

    ```bash
    php artisan key:generate
    ```

6. Exécutez les migrations et les seeders pour créer et remplir la base de données :

    ```bash
    php artisan migrate --seed
    ```

## Lancer l'application

Pour lancer l'application en local, utilisez la commande suivante :

    php artisan serve
