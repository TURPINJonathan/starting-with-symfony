# Satrting With Symfony

## Créer un projet Symfony

Pour créer un projet Symfony, se placer dans le dossier cible puis lancer la commande
```sh
symfony new --webapp NomDuProjet
```
## L'environnement de Symfony

Nous utilisons plusieurs fichiers pour pouvoir réaliser une application Symfony :

| Dossiers | Définitions |
| --- | --- |
| `src/Controller` | Gèrent entre autre le routing ainsi que la logique entre la *requete* et la réponse à donner |
| `src/Entity` | Représente les objets de l'application |
| `src/Repository` | Recense les différentes *method* qui peuvent être appelées *(par exemple: `find()`, `finAll()`, ...)* |
| `/config`| Nous permettra de configurer notre application selon nos besoins. |
| `migrations` | Nous permettra d'avoir l'historique des différentes versions de notre base de données. |
| `templates` | Si le *front* de l'application est gérée via *Symfony*, c'est ici qu'il faudra le coder, souvent grâce à `twig` |

### Créer un `Controller`

## Commandes utiles
<details>
<summary>Connaître les versions locales PHP</summary>

```sh
symfony local:php:list
```
Résultat :
![symfony local:php:list](./pictures/symfony_localphplist.png)
</details>
<details>
<summary>Lister les commandes Symfony</summary>

```sh
symfony local:php:list
```
Résultat :
![symfony list](./pictures/symfony_list.png)
</details>
<details>
<summary>Démarrer un projet Symfony</summary>

```sh
symfony new --webapp NomDeLApplication
```
</details>
<details>
<summary>Créer un controller</summary>

```sh
symfony make:controller
```
</details>