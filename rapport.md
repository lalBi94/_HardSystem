# Rapport <font color="#0a1b2f"> Hard-System </font>



## Bilal Boudjemline, Fares Sid Athmane, Guy Bade

## Introduction
Aujourd'hui, nous vous présentons le site qu'on a crée : **Hard-System**.
Ce site est un lieu commercial technologique **B2C**. 

## Arborescence et explications des fichiers
 **Hard-System.src/**
├── **assets/**  <font color="lightgrey"> # Contenant les éléments stockes dans le site</font>
│   ├── **cgu/**  <font color="lightgrey"> # Contenant les conditions general d'utilisation </font>
│   │   ├── CGU-Hard-System.fr.pdf <font color="lightgrey"> # Les CGU </font>
│   ├── **layout/** <font color="lightgrey"> # Contenant l'image d'arriere plan de tout le site </font>
│   │ ├── layout-index.svg <font color="lightgrey"> # Le layout </font>
│   ├── **logos/**  <font color="lightgrey"> # Contenant les differents logos du site </font>
│   │├── cart.png <font color="lightgrey"> # Image utiliser pour l'ajout d'un item dans le panier </font>
│   │├── favicon.svg <font color="lightgrey"> # Icon du site </font>
│   │├── nav-con.png <font color="lightgrey"> # Icon  present dans la barre de navigation</font>
│   ├── **request_send/**  <font color="lightgrey"> # Contenant gif renvoyer lors de l'envoies d'un formulaire fini </font>
│   │├── check_request.gif <font color="lightgrey"> # Quand il n'y a pas d'erreur </font>
│   │├── false_request.gif <font color="lightgrey"> # Quand il y a une erreur </font>
├── **clients/**  <font color="lightgrey"> # Contenant les pages liées aux clients</font>
│   ├── **error/**  <font color="lightgrey"> # Contenant les conditions général d'utilisation </font>
│   │├── db_error.php <font color="lightgrey"> # Erreur lors de la liaison a la bdd</font>
│   │├── error-head <font color="lightgrey"> # L'entre balise head des pages d'erreurs </font>
│   │├── error-nav.php <font color="lightgrey"> # L'entre balise nav des pages d'erreurs</font>
│   │├── login_clientExist.php <font color="lightgrey"> # Erreur quand un client n'existe pas</font>
│   │├── register_clientExist.php <font color="lightgrey"> # Erreur quand un client s'inscrit avec un identifiant deja existant</font>
│   │├── register_error.php <font color="lightgrey"> # Erreur global d'inscription</font>
│   ├── **instance/**  <font color="lightgrey"> # Contenant les conditions général d'utilisation </font>
│   │ ├── **process**
│   ││ ├── buyItem.php <font color="lightgrey"> # Processus d'achat d'objet</font>
│   ││ ├── check-card.js <font color="lightgrey"> # Conditions necessaires pour valider les cartes bleus etc...</font>
│   ││ ├── check-info.js <font color="lightgrey"> # Condition necessaires a la vente d'un item</font>
│   ││ ├── loadercart.css <font color="lightgrey"> # Animation qui fait un semblant de delai lors de l'ajout d'un item dans le panier</font>
│   ││ ├── process_admin.php <font color="lightgrey"> # Processus administrateur pour cree un item</font>
│   ││ ├── sellItem.php <font color="lightgrey"> # Processus de vente d'objet</font>
│   │├── account_info.php <font color="lightgrey"> # Informations du compte</font>
│   │├── admin_instance.php <font color="lightgrey"> # Createur d'item</font>
│   │├── cart_buy.php <font color="lightgrey"> # Entree des informations de paiement</font>
│   │├── cart_instance.php <font color="lightgrey"> # Visualisation du panier</font>
│   │├── index_instance.php <font color="lightgrey"> # Page d'accueil des clients connectes</font>
│   │├── item_details.php <font color="lightgrey"> # Detail d'un item</font>
│   │├── preShop_instance.php <font color="lightgrey"> # Choix d'une categorie pour achat</font>
│   │├── require_footer.php <font color="lightgrey"> # L'entre balise footer pour l'instance</font>
│   │├── require_head.php <font color="lightgrey"> # L'entre balise head pour l'instance</font>
│   │├── require_nav.php <font color="lightgrey"> # L'entre balise nav pour l'instance</font>
│   │├── sell_instance.php <font color="lightgrey"> # Page Vente d'items</font>
│   │├── shop_instance.php <font color="lightgrey"> # Page Achat d'items</font>
│   │├── showHistoryBuys.php <font color="lightgrey"> # Historique d'achat</font>
│   │├── showHistorySells.php <font color="lightgrey"> # Historique de vente</font>
│   ├── **process/**  <font color="lightgrey"> # Contenant les processus généraux lie a l'avant et apres connexion</font> 
│   │├── check_info.js <font color="lightgrey"> # Condition qui est necessaire a la validiter du formualaire d'inscription et connexion </font>
│   │├── clients_api.php <font color="lightgrey"> # API interne contenant des fonctions relative aux clients </font>
│   │├── disconnect.php <font color="lightgrey"> # Lors de la deconnexion </font>
│   │├── items_api.php <font color="lightgrey"> # API interne contenant des fonctions relative aux items</font>
│   │├── login.php <font color="lightgrey"> # Processus de connexion</font>
│   │├── register.php <font color="lightgrey"> # Processus d'inscription</font>
│  **eClientLogin.php**  <font color="lightgrey"> # Page de connexion </font>
│  **eClientRegister.php**  <font color="lightgrey"> # Page d'inscription </font>
├── **db/**  <font color="lightgrey"> # Contenant les informations liees a la bdd</font>
│   ├── db_connect.php  <font color="lightgrey"> # Liaison bdd </font>
│   ├── hardsys.sql  <font color="lightgrey"> # La base de données </font>
├── **style/**  <font color="lightgrey"> # Contenant les fichiers .css</font>
│   ├── **contact/** <font color="lightgrey"> # Style liees aux envoies de formulaire </font>
│   ││ ├── contact.css
│   ├── **eClient/**  <font color="lightgrey"> # Style liees aux pages clientes (login, register)</font>
│   ││ ├── eClient.css
│   ├── all <font color="lightgrey"> # Style liees a l'ensemble des pages</font>
│   ├── footer <font color="lightgrey"> # Style liees au footer</font>
│   ├── nav <font color="lightgrey"> # Style liees a la barre de navigatoire</font>
├──rapport .md <font color="lightgrey"> # Le rapport </font>
├──LICENSE <font color="lightgrey"> # Apache License</font>
├──index.php  <font color="lightgrey"> # Page d'accueil</font>

## Fonctionnalité demandé fonctionnelles
<font color="green">**✓ Toutes mis a part les points cités dans la partie suivant**</font>
<font color="green">**✓ Toutes les fonctionnalités non-demandées ajouté en plus**</font>

## Fonctionnalité demandé non-fonctionnelles
<font color="red"> **× Decrementer la quantite dans businesssell lors de l'achat d'un item appartenant a une entreprise.** </font>

## Fonctionnalités ajoutées non-demandés fonctionnelles
 **Systeme de panier :**
-  **Quatres variables `$_SESSION['cart'], ['qtecart'], ['url'], ['cart-business']`**
	- **`['cart']`** = contenant a la cle de l'id de l'item le prix;
	- **`['qtecart']`** = contenant a la cle de l'id de l'item la quantite
	- **`['url']`** = contenant a la cle de l'id de l'item l'id de l'item 
	- **`['cart-business']`** = contenant a la cle de l'id de l'item l'id de la vente entreprise (businesssell) 
$$
\ Le \ total \ du \ panier \ est  \ obtenu  \ ainsi \ :
\Rho =\sum_{\begin{subarray}{l}i=0\in\N\\i+=1\end{subarray}}^i (Prix_i \ (Quantite_i\in\N))
$$

**API interne :**
- **API Cliente : `require('clients_api.php')`**
	- Recuperation de l'id via le login et inversement
	- Recuperation de toutes les informations d'un client (cagnotte, info perso, etc...) via l'id
-  **API Item : `require('items_api.php')`**
	- Recuperation de l'id via le nom de l'item et inversement
	- Recuperation de toutes les informations d'un item (Details, elements extraits, etc...) via l'id

**Suivi de la cagnotte via un graphique generer automatiquement par Google Charts.**