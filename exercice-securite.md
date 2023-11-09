# Sécurité : module et permission

Cet exercice a pour objectif : 
* De savoir utiliser les modules de sécurité
* De pouvoir déclarer une nouvelle permission et de l'utiliser

## Utilisation des modules de sécurité

### Sécuriser son site avec security_review


* Installer et activer le module security_review
* Puis une fois fait, aller sur la page du module, et vérifier si votre site est sécurisé
* Si ce n'est pas le cas, suivre les indications données par le module pour sécuriser votre site

### Définir une police de mot de passe avec password_policy

* Installer et activer le module password_policy
* Une fois fait aller dans la configuration pour définir une politique de mot de passe
* Créer un nouveau compte utilisateur et demandez lui de définir son mot de passe
* Dans une fenêtre de navigation privée ou dans un autre navigateur, connectez vous avec l'utilisateur crée et changer le mot de passe, cela vous permet de vérifier si la police de mot de passe que vous avez définie est bien appliquée

## Déclarer une nouvelle permission 

* A la racine du module créer un fichier appeler monmodule.permissions.yml 
* Ce fichier sert à déclarer des permissions statique
* Ajouter le code suivant dans ce fichier pour déclarer la permission :
```
administer demo_module_boat configuration:
  title: 'Administer demo_module_boat configuration'
  description: 'Optional description.'
  restrict access: false
```
* Aller dans l'interface vérifier que votre nouvelle permission apparait bien dans la liste (après avoir vider le cache de votre site)
* Donner la permission aux utilisateurs authentifiés (ou à tout autre rôle que vous avez créé)
* Nous allons maintenant associé cette permission au bloc crée dans l'exercice 3, pour cela nous rajoutons une fonction BlockAccess dans le plugin block :
```
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'administer demo_module_boat configuration');
  }
```

## Bonus - Déclarer une permission dynamique

* Ajouter un champs booléen, à vendre dans le type de contenu Bateau. 
* Définir une permission dynamique afin de ne rendre accessible les noeuds de type bateau en lecture que à leur propriétaire sauf si le bateau est à vendre (booléen true)