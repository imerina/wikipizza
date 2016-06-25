<?php
/*
 * Maquette de la page d'accueil
 */
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/LAB/wikipizza/web/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/LAB/wikipizza/web/css/main.css" rel="stylesheet">
    <title>Wikipizza - Home</title>
  </head>
  <body>
    <div class="container">

      <!-- Header -->

      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/LAB/wikipizza/web/">Wikipizza</a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse-target">

          </div>
        </div><!-- /.container -->
      </nav>

      <!-- Content -->

      <div id="content">
        <div class="jumbotron">
          <h1>Bienvenue sur Wikipizza</h1>
          <p>Le site qui va vous faire aimer les pizzas</p>
          <p>
            <a class="btn btn-primary btn-lg" role="button" href="/LAB/wikipizza/web/pizzas">Continuer »</a>
          </p>
        </div> <!-- /.jumbotron -->
        <br/>
        <br/>
        <br/>
        <br/>
      </div> <!-- /.content -->

    </div><!-- /.container -->

    <!-- Footer -->
    <footer class="footer">
      <a href="https://github.com/bpesquet/OC-MicroCMS">Wikipizza</a> est un gestionnaire de pizzas.
    </footer>

    <!-- jQuery -->
    <script src="/LAB/wikipizza/web/lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="/LAB/wikipizza/web/lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

