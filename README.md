# Starting With Symfony
**SOMMAIRE**
- [Les basiques](./Cours/les_basiques.md)
- [Les controller](./Cours/controller.md)
- [Les entity](./Cours/entity.md)
- [Les bases de données](./Cours/bdd.md)
- [Les Injections de Dépendances](./Cours/injections_dependances.md)
- [Les tests](./Cours/test.md)
- [Les commandes utiles](./Cours/commandes_utiles.md) 

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
