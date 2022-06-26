# Rapport <font color="#0a1b2f"> Hard-System </font>
``Bilal Boudjemline, Fares Sid Athmane, Guy Bade``

## Introduction
Aujourd'hui, nous vous présentons le site qu'on a crée : **Hard-System**.</br>
Ce site est un lieu commercial technologique **B2C**. 

## Arborescence et explications des fichiers
 **Hard-System.src/**</br>
├── **assets/**  <font color="lightgrey"> # Contenant les éléments stockes dans le site</font></br>
│   ├── **cgu/**  <font color="lightgrey"> # Contenant les conditions general d'utilisation </font></br>
│   │   ├── CGU-Hard-System.fr.pdf <font color="lightgrey"> # Les CGU </font></br>
│   ├── **layout/** <font color="lightgrey"> # Contenant l'image d'arriere plan de tout le site </font></br>
│   │ ├── layout-index.svg <font color="lightgrey"> # Le layout </font></br>
│   ├── **logos/**  <font color="lightgrey"> # Contenant les differents logos du site </font></br>
│   │├── cart.png <font color="lightgrey"> # Image utiliser pour l'ajout d'un item dans le panier </font></br>
│   │├── favicon.svg <font color="lightgrey"> # Icon du site </font></br>
│   │├── nav-con.png <font color="lightgrey"> # Icon  present dans la barre de navigation</font></br>
│   ├── **request_send/**  <font color="lightgrey"> # Contenant gif renvoyer lors de l'envoies d'un formulaire fini </font></br>
│   │├── check_request.gif <font color="lightgrey"> # Quand il n'y a pas d'erreur </font></br>
│   │├── false_request.gif <font color="lightgrey"> # Quand il y a une erreur </font></br>
├── **clients/**  <font color="lightgrey"> # Contenant les pages liées aux clients</font></br>
│   ├── **error/**  <font color="lightgrey"> # Contenant les conditions général d'utilisation </font></br>
│   │├── db_error.php <font color="lightgrey"> # Erreur lors de la liaison a la bdd</font></br>
│   │├── error-head <font color="lightgrey"> # L'entre balise head des pages d'erreurs </font></br>
│   │├── error-nav.php <font color="lightgrey"> # L'entre balise nav des pages d'erreurs</font></br>
│   │├── login_clientExist.php <font color="lightgrey"> # Erreur quand un client n'existe pas</font></br>
│   │├── register_clientExist.php <font color="lightgrey"> # Erreur quand un client s'inscrit avec un identifiant deja existant</font></br>
│   │├── register_error.php <font color="lightgrey"> # Erreur global d'inscription</font></br>
│   ├── **instance/**  <font color="lightgrey"> # Contenant les conditions général d'utilisation </font></br>
│   │ ├── **process**</br>
│   ││ ├── buyItem.php <font color="lightgrey"> # Processus d'achat d'objet</font></br>
│   ││ ├── check-card.js <font color="lightgrey"> # Conditions necessaires pour valider les cartes bleus etc...</font></br>
│   ││ ├── check-info.js <font color="lightgrey"> # Condition necessaires a la vente d'un item</font></br>
│   ││ ├── loadercart.css <font color="lightgrey"> # Animation qui fait un semblant de delai lors de l'ajout d'un item dans le panier</font></br>
│   ││ ├── process_admin.php <font color="lightgrey"> # Processus administrateur pour cree un item</font></br>
│   ││ ├── sellItem.php <font color="lightgrey"> # Processus de vente d'objet</font></br>
│   │├── account_info.php <font color="lightgrey"> # Informations du compte</font></br>
│   │├── admin_instance.php <font color="lightgrey"> # Createur d'item</font></br>
│   │├── cart_buy.php <font color="lightgrey"> # Entree des informations de paiement</font></br>
│   │├── cart_instance.php <font color="lightgrey"> # Visualisation du panier</font></br>
│   │├── index_instance.php <font color="lightgrey"> # Page d'accueil des clients connectes</font></br>
│   │├── item_details.php <font color="lightgrey"> # Detail d'un item</font></br>
│   │├── preShop_instance.php <font color="lightgrey"> # Choix d'une categorie pour achat</font></br>
│   │├── require_footer.php <font color="lightgrey"> # L'entre balise footer pour l'instance</font></br>
│   │├── require_head.php <font color="lightgrey"> # L'entre balise head pour l'instance</font></br>
│   │├── require_nav.php <font color="lightgrey"> # L'entre balise nav pour l'instance</font></br>
│   │├── sell_instance.php <font color="lightgrey"> # Page Vente d'items</font></br>
│   │├── shop_instance.php <font color="lightgrey"> # Page Achat d'items</font></br>
│   │├── showHistoryBuys.php <font color="lightgrey"> # Historique d'achat</font></br>
│   │├── showHistorySells.php <font color="lightgrey"> # Historique de vente</font></br>
│   ├── **process/**  <font color="lightgrey"> # Contenant les processus généraux lie a l'avant et apres connexion</font> </br>
│   │├── check_info.js <font color="lightgrey"> # Condition qui est necessaire a la validiter du formualaire d'inscription et connexion </font></br>
│   │├── clients_api.php <font color="lightgrey"> # API interne contenant des fonctions relative aux clients </font></br>
│   │├── disconnect.php <font color="lightgrey"> # Lors de la deconnexion </font></br>
│   │├── items_api.php <font color="lightgrey"> # API interne contenant des fonctions relative aux items</font></br>
│   │├── login.php <font color="lightgrey"> # Processus de connexion</font></br>
│   │├── register.php <font color="lightgrey"> # Processus d'inscription</font></br>
│  **eClientLogin.php**  <font color="lightgrey"> # Page de connexion </font></br>
│  **eClientRegister.php**  <font color="lightgrey"> # Page d'inscription </font></br>
├── **db/**  <font color="lightgrey"> # Contenant les informations liees a la bdd</font></br>
│   ├── db_connect.php  <font color="lightgrey"> # Liaison bdd </font></br>
│   ├── hardsys.sql  <font color="lightgrey"> # La base de données </font></br>
├── **style/**  <font color="lightgrey"> # Contenant les fichiers .css</font></br>
│   ├── **contact/** <font color="lightgrey"> # Style liees aux envoies de formulaire </font></br>
│   ││ ├── contact.css</br>
│   ├── **eClient/**  <font color="lightgrey"> # Style liees aux pages clientes (login, register)</font></br>
│   ││ ├── eClient.css</br>
│   ├── all <font color="lightgrey"> # Style liees a l'ensemble des pages</font></br>
│   ├── footer <font color="lightgrey"> # Style liees au footer</font></br>
│   ├── nav <font color="lightgrey"> # Style liees a la barre de navigatoire</font></br>
├──rapport .md <font color="lightgrey"> # Le rapport </font></br>
├──LICENSE <font color="lightgrey"> # Apache License</font></br>
├──index.php  <font color="lightgrey"> # Page d'accueil</font></br>

## Fonctionnalité demandé fonctionnelles
<font color="green">**✓ Toutes mis a part les points cités dans la partie suivant**</font></br>
<font color="green">**✓ Toutes les fonctionnalités non-demandées ajouté en plus**</font></br>

## Fonctionnalité demandé non-fonctionnelles
<font color="red"> **× Decrementer la quantite dans businesssell lors de l'achat d'un item appartenant a une entreprise.** </font></br>

## Fonctionnalités ajoutées non-demandés fonctionnelles
 **Systeme de panier :**
-  **Quatres variables `$_SESSION['cart'], ['qtecart'], ['url'], ['cart-business']`**
	- **`['cart']`** = contenant a la cle de l'id de l'item le prix;
	- **`['qtecart']`** = contenant a la cle de l'id de l'item la quantite
	- **`['url']`** = contenant a la cle de l'id de l'item l'id de l'item 
	- **`['cart-business']`** = contenant a la cle de l'id de l'item l'id de la vente entreprise (businesssell)</br>![enter image description here](https://64.media.tumblr.com/b97ec4d98474affd3e3a2df2c2591798/cf824195fb3b75b9-95/s540x810/50e6540e95f0a4be90bcd9d39438cc471ecfe7b0.pnj)

**API interne :**
- **API Cliente : `require('clients_api.php')`**
	- Recuperation de l'id via le login et inversement
	- Recuperation de toutes les informations d'un client (cagnotte, info perso, etc...) via l'id
-  **API Item : `require('items_api.php')`**
	- Recuperation de l'id via le nom de l'item et inversement
	- Recuperation de toutes les informations d'un item (Details, elements extraits, etc...) via l'id

**Suivi de la cagnotte via un graphique generer automatiquement par Google Charts.**

## Organisation du projet
**Le suivi et l'organisation s'est faite de plusieurs façons :**
- Via <a href='discord.gg'>Discord</a> (en appel de groupe, reunion etc...)</br>
![le groupe](https://64.media.tumblr.com/a9a77c2539ee2dec3c184c7641c9f2c8/5dac75b8950a75f8-f8/s250x400/5899658ece9958219963822f908b6da8929816c6.pnj)
- Via la plateforme <a href='https://monday.com/'>Monday</a> (ci-dessous le commencement du projet)</br>
![](https://64.media.tumblr.com/1bc702b47cff8ae01e18bf35d96432a1/53a6a51551098fbb-de/s540x810/1e43b13a3c2f3331815a0ab9d3603d3ebd5162f6.pnj)
- Via la plateforme <a href =''>Pastebin</a> pour écrire des procédures utiles au groupe
	- https://pastebin.com/u8MXVwfU
	- https://pastebin.com/gkNmu6NX
- Via <a href='https://github.com/lalBi94/_HardSystem'>GitHub</a> pour synchroniser le travail

## Conclusion individuelle
</br>**Bilal** </br>
> J''ai trouve cette SAE interessante et amusante a faire. Malgres le faites que les consignes de la SAE n'ont pas ete clair sur certain point, nous avons essayer de faire de notre mieux.</br>
> 
</br>**Guy** </br>
> J''ai trouve cette SAE interessante et amusante a faire. Malgres le faites que les consignes de la SAE n'ont pas ete clair sur certain point, nous avons essayer de faire de notre mieux.</br>
> 
</br>**Fares** </br>
> J''ai trouve cette SAE interessante et amusante a faire. Malgres le faites que les consignes de la SAE n'ont pas ete clair sur certain point, nous avons essayer de faire de notre mieux.</br>