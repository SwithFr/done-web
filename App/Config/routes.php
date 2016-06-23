<?php

use Core\Router;

/**
 * Le chemin d'accès à une page est configuré comme étant
 * Controller/action qui lui correspond avec éventuellement quelque paramettres
 * En utilisant les routes vous pouvez changer ce comportement
 * en utilisant le router. Il vous suffit de suivre l'exemple ci-dessous
 */

Router::join('accueil', [
    "controller" => 'pages',
    "action" => 'index'
]);

Router::join('decouvrir/{step}', [
    "controller" => 'tasks',
    "action" => 'discover',
    "params" => [
        'step' =>  '/[0-3]+/'
    ]
]);

Router::join('decouvrir/projects', [
    "controller" => 'projects',
    "action" => 'createFromDiscover'
]);

Router::join('decouvrir/tasks', [
    "controller" => 'tasks',
    "action" => 'createFromDiscover'
]);