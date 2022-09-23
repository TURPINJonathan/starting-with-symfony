# LES BASES DE DONNEES
[Menu principal](./README.md)  
## Lier sa base de données avec Symfony
Afin de pouvoir lier notre production avec une base de données, il faut avant tout alimenter les différents paramètres contenus dans le fichier `.env`, situé à la racine du projet.

En effet, dans ce fichier, les lignes *30* à *32* déterminent quel est le **S**ystème de **G**estion de **B**ases de **D**onnées **R**elationnelles *(SGBDR)* choisi.  
```
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=14&charset=utf8"
```
Il sera donc important non seulement de faire son choix, mais également d'affiner ses paramètres *(user, mot de passe, nom de la base de données)*

## Interagir avec sa base de données

### Créer la base donnée
La création de fait simplement par la commande **Symfony**
```sh
symfony console doctrine:database:create
```
### La migration en base de données
#### Préparer la migration
Au fur et à mesure que l'on détermine ce que sera la base données, nous créons des *tables*, des *colonnes*, des *propriétés*, etc. Pour autant, rien ne se passera tant que nous ne générons pas les différentes requêtes `SQL` permettant cela.
Pour créer le fichier de migration, qui s'incrira dans le dossier `./migrations`, entrez la commande suivante :
```sh
symfony console make:migration
```
Un nouveau fichier est alors créé avec les différentes commandes `SQL` à jouer pour obtenir la base de données souhaitée.

#### Migrer
La préparation étant faites, il ne reste plus qu'à communiquer les commandes au *SGBDR* :
```sh
symfony console doctrine:migrations:migrate
```
### Mettre à jour le `schema`
Suivant les modifications qu'on pu être apportées au `schema`, il est possible de vérifier, avant d'interagir avec le *SGBDR*, les commandes qui seront exécutées :
```sh
symfony console doctrine:schema:update --dump-sql
```
Si les requêtes nous sont satisfaisantes, nous pouvons alors mettre à jour le `schema` :
```sh
symfony console doctrine:schema:update
```

