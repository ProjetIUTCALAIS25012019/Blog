<!-- Menu, navigation  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">BLOG BMW FRANCE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

              <form class="form-inline my-2 my-lg-0" action="recherche.php" method="get" enctype="multipart/form-data" id="form_article">
                  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Recherche...">
                  <input type="submit" class="btn btn-success" value="Valider" />
              </form>

                <?php
                if(isset($_COOKIE['sid']))
                {
                echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"index.php\">Accueil</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"article.php\">Article</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"deconnexion.php\">Déconnexion de ".$nom_connect." ".$prenom_connect."</a>
                        </li>

                    " ;
                }else
                {
                echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"index.php\">Accueil</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"connexion.php\">Connexion</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"inscription.php\">Inscription</a>
                        </li>
                    " ;
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
