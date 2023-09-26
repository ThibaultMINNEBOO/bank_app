# Bankazor - Application de gestion de compte en ligne

Bankazor est une application de gestion de compte bancaire en ligne.

## Installation / Configuration

Vous pouvez installer le projet en local sur votre machine en faisant cet enchaînement de commandes :

```shell
git clone https://github.com/ThibaultMINNEBOO/bank_app.git
cd bank_app
composer install
```

## Environements

Veuillez copier coller le fichier `.env` et le renommer en `.env.local` afin de le compléter à votre convenance.

## Fixtures

Vous pouvez générer vos données factices via la commande :

```shell
composer load:fixtures
```

## Serveur Web Local

Vous pouvez lancer le serveur web local via la commande :

```shell
composer start
```