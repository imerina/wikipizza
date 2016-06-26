<?php
/**
 *  Routes
 */
/**
 * Page d'accueil
 */
$app->get('/', function () use ($app) {
  return $app['twig']->render('index.html.twig');
})->bind('home');
/**
 * Liste des pizzas
 */
$app->get('/pizzas', function () use ($app) {
  $pizzas = $app['dao.pizza']->findAll();
  return $app['twig']->render('pizzas.html.twig', array('pizzas' => $pizzas));
})->bind('pizzas');
/**
 * Détail d'un pizza
 */
$app->get('/pizzas/{id}', function ($id) use ($app) {
  $pizza = $app['dao.pizza']->findById($id);
  return $app['twig']->render('pizza.html.twig', array('pizza' => $pizza));
})->bind('pizza');