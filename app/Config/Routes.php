<?php

// Utilisation de l'espace de noms (namespace) CodeIgniter\Router\RouteCollection pour gérer les routes
use CodeIgniter\Router\RouteCollection;

/**
 * Déclaration de la variable $routes comme une instance de la classe RouteCollection.
 * Cette variable est utilisée pour définir les différentes routes dans l'application.
 *
 * @var RouteCollection $routes
 */

// Définition de la première route : lorsque l'utilisateur accède à la racine du site, la méthode index du contrôleur Home sera appelée.
$routes->get('/', 'Home::index');

// Routes liées au contrôleur d'AuthController
$routes->get('users/auth', 'AuthController::showForm'); // Affiche le formulaire d'authentification (connexion ou inscription)
$routes->post('users/signIn', 'AuthController::store'); // Traite la soumission du formulaire d'inscription d'un User
$routes->post('users/login', 'AuthController::login'); // Traite la soumission du formulaire de connexion d'un User
$routes->get('users/logout', 'AuthController::logout', ['filter' => 'authentication']); // Traite la déconnexion du user


// Routes liées au contrôleur DevisController
$routes->get('devis', 'DevisController::index', ['filter' => 'authentication']); // Affiche la liste des devis
$routes->get('devis/create', 'DevisController::create', ['filter' => 'authentication']); // Affiche le formulaire de création de devis
$routes->get('devis/view/(:num)', 'DevisController::view/$1', ['filter' => 'authentication']); // Affiche les détails d'un devis spécifique
$routes->get('devis/edit/(:num)', 'DevisController::edit/$1', ['filter' => 'authentication']); // Affiche le formulaire d'édition d'un devis
$routes->post('devis/store', 'DevisController::store', ['filter' => 'authentication']); // Traite la soumission du formulaire de création de devis
$routes->post('devis/update/(:segment)', 'DevisController::update/$1', ['filter' => 'authentication']); // Traite la soumission du formulaire d'édition de devis
$routes->get('devis/delete/(:segment)', 'DevisController::delete/$1', ['filter' => 'authentication']); // Supprime un devis spécifique

// Routes liées au contrôleur ItemController
$routes->get('items', 'ItemController::index', ['filter' => 'authentication']); // Affiche la liste des articles
$routes->get('items/create', 'ItemController::create', ['filter' => 'authentication']); // Affiche le formulaire de création d'article
$routes->post('items/store', 'ItemController::store', ['filter' => 'authentication']); // Traite la soumission du formulaire de création d'article
$routes->get('items/edit/(:num)', 'ItemController::edit/$1', ['filter' => 'authentication']); // Affiche le formulaire d'édition d'article
$routes->post('items/update/(:segment)', 'ItemController::update/$1', ['filter' => 'authentication']); // Traite la soumission du formulaire d'édition d'article
$routes->get('items/delete/(:segment)', 'ItemController::delete/$1', ['filter' => 'authentication']); // Supprime un article spécifique

// Routes liées au contrôleur ClientController
$routes->get('clients', 'ClientController::index', ['filter' => 'authentication']); // Affiche la liste des clients
$routes->get('clients/create', 'ClientController::create', ['filter' => 'authentication']); // Affiche le formulaire de création de clients
$routes->get('clients/view/(:num)', 'ClientController::view/$1', ['filter' => 'authentication']); // Affiche les détails d'un client spécifique
$routes->get('clients/edit/(:num)', 'ClientController::edit/$1', ['filter' => 'authentication']); // Affiche le formulaire d'édition d'un client
$routes->post('clients/store', 'ClientController::store', ['filter' => 'authentication']); // Traite la soumission du formulaire de création d'un client
$routes->post('clients/update/(:segment)', 'ClientController::update/$1', ['filter' => 'authentication']); // Traite la soumission du formulaire d'édition d'un client
$routes->get('clients/delete/(:segment)', 'ClientController::delete/$1', ['filter' => 'authentication']); // Supprime un client spécifique
