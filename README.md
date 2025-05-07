**Voici les librairies pour le site E-commerce :**

{
    "require": {
        "twig/twig": "3.*"
    }
}

**Pour installer les librairies :**

- aller sur le site : [https://twig.symfony.com/doc/3.x/installation.html](https://getcomposer.org/download/)
- Puis Installer en ligne de commande le script suivant dans votre terminal VS Code :

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installateur vérifié'.PHP_EOL; } else { echo 'Installateur corrompu'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
