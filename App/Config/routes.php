<?php

use Core\Router;

/**
 * Le chemin d'accès à une page est configuré comme étant
 * Controller/action qui lui correspond avec éventuellement quelque paramettres
 * En utilisant les routes vous pouvez changer ce comportement
 * en utilisant le router. Il vous suffit de suivre l'exemple ci-dessous
 */

# PAGES
Router::get('accueil', [
    "controller" => 'pages',
    "action" => 'index'
]);

Router::get('decouvrir/{step}', [
    "controller" => 'tasks',
    "action" => 'discover',
    "params" => [
        'step' =>  '/[0-3]+/'
    ]
]);

Router::get('non-merci', [
    "controller" => 'pages',
    "action" => 'bye'
]);

Router::post('decouvrir/projets', [
    "controller" => 'projects',
    "action" => 'createFromDiscover'
]);

Router::post('decouvrir/taches', [
    "controller" => 'tasks',
    "action" => 'createFromDiscover'
]);

Router::get('tableau-de-bord', [
    "controller" => 'pages',
    "action" => 'dashboard',
    "prefixe" => 'user'
]);

Router::post('chercher', [
    "controller" => 'pages',
    "action" => 'search',
    "prefixe" => 'user'
]);

# USERS
Router::any('connexion', [
    "controller" => 'users',
    "action" => 'connect'
]);

Router::any('inscription', [
    "controller" => 'users',
    "action" => 'register'
]);

Router::get('au-revoir', [
    "controller" => 'users',
    "action" => 'logout'
]);

# PROJECTS
Router::get('projets/ajout', [
    "controller" => 'projects',
    "action" => 'add',
    "prefixe" => 'user'
]);

Router::post('projets/ajout', [
    "controller" => 'projects',
    "action" => 'store',
    "prefixe" => 'user'
]);

# TASKS
Router::get('taches/ajout', [
    "controller" => 'tasks',
    "action" => 'add',
    "prefixe" => 'user'
]);

Router::post('taches/ajout', [
    "controller" => 'tasks',
    "action" => 'store',
    "prefixe" => 'user'
]);

Router::get('taches/suppression/{id}', [
    "controller" => 'tasks',
    "action" => 'delete',
    "prefixe" => 'user',
    "params" => [
        'id' =>  '/[0-3]+/'
    ]
]);