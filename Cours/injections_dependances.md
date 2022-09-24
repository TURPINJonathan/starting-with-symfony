# LES INJECTIONS DE DEPENDANCES
[Menu Principal](../README.md)

Les injections de dépendances *Symfony* sont réalisées via le container *Service*, construit par le `ContainerBuilder`, initialisé par `Kernel`.  
L’injection de dépendances est un mécanisme qui permet d’implémenter le principe de l’inversion de contrôle. L’idée est de créer dynamiquement (injecter) les dépendances d’une classe en utilisant une description (un fichier de configuration par exemple). Cette méthode va nous permettre de ne plus exprimer les dépendances entre les composants dans le code de manière statique, mais de les déterminer dynamiquement à l’exécution.  

L'intérêt principal de l'injection de dépendances est de séparer la création des objets de leurs utilisations. De plus, en injectant nos dépendances, nous pouvons utiliser des interfaces au lieu des classes, et ainsi éciter un couplage fort entre nos classes.

## Cas concret

*Une `class A` dépend d'une `class B` et d'une `class C`.*

<details>
  <summary>Sans injection de dépendances, cela donnerait &darr;</summary>

  * Pour la `class B`:  
    ```php
    <?php

    namespace App\Services;

    class B implements InterfaceB {
        // ...
    }
    ```
  * Pour la `class C`:  
    ```php
    <?php

    namespace App\Services;

    class C implements InterfaceC {
        // ...
    }
    ```
  * Pour la `class A`:  
    ```php
    <?php

    namespace App\Services;

    class A {
        private B $b;
        private C $c;

        public function __construct()
        {
            $this->b = new B();
            $this->c = new C();
        }

        // ...
    }
    ```
</details>  

L'injection de dépendances va permettre de ne plus instancier la `class B` ni la `class C`. 

* Avant `PHP8.0` :
  ```php
  <?php

  namespace App\Services;

  class A {
      private InterfaceB $b;
      private InterfaceC $c;

      public function __construct(InterfaceB $b, InterfaceC $c)
      {
          $this->b = $b;
          $this->c = $c;
      }

      // ...
  }
  ```
* Après `PHP8.0` :
  ```php
  <?php

  namespace App\Services;

  class A {
      public function __construct(
          private InterfaceB $b,
          private InterfaceC $c,
      ) {
      }

      // ...
  }
  ```