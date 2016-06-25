<?php
/**
 *  Routes
 */
/**
 * Page d'accueil
 */
$app->get('/', function () use ($app) {
  return $app['twig']->render('index.html.twig');
});
/**
 * Liste des pizzas
 */
$app->get('/pizzas', function () use ($app) {
  $pizzas = $app['dao.pizza']->findAll();
  return $app['twig']->render('pizzas.html.twig', array('pizzas' => $pizzas));
});