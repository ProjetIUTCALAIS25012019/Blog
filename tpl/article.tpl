{***Si type=defaut alors affichage de la page d'ajout d'article***} {if $type=="defaut" }
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Ajouter un article</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

        <div class="form-group">
          <label for="titre" class="col-form-label">Titre</label>
          <input type="texte" class="form-control" id="titre" name="titre" placeholder="Titre de votre article" value="" required>
        </div>

        <div class="form-group">
          <label for="texte" class="col-form-label">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input">
            <label class="custom-file-label" for="image">Choisir un fichier</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <label for="publie" class="form-check-label">
              <input checked class="form-check-input" onclick="$(this).val(this.checked ? 1 : 0)" name="publie" id="publie" type="checkbox" value="1">Publié
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="ajouter" value="ajouter"> Ajouter l'article</button>

      </form>
    </div>
  </div>
</div>
{/if}



{***Si type = afficherplus alors affichage complet de l'article***}
{if $type == "afficherplus"}

<div class="container">

  <div class="col-lg-12 text-center">
    {if isset($session_var.notifications)}
    <div class="alert alert-{$session_var.notifications.color} alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
      {$session_var.notifications.message}
    </div>
    {/if}
  </div>

  <div class="row">
    {***Pour chaques article dans tab_article***}
    {***Affichage du titre***}
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">{$tab_article[0].titre}</h1>
    </div>
    {***Affichage de l'image***}
    <div class="col-lg-6 text-center center">
      <img class="card-img-top" src="images/{$tab_article[0].id}.jpg" alt="Pas d'image">
    </div>
    {***Affichage de la date***}
    <div class="col-lg-12 text-center">
      <p>{$tab_article[0].date_fr}</p>
    </div>
    {***Affichage du texte***}
    <div class="col-lg-12 text-center">
      <p>{$tab_article[0].texte}</p>
    </div>
    {***Affichage du bouton accueil***}
    <div class="col-lg-12 text-center">
      <a class="btn btn-primary margin" href="index.php"> Accueil</a>
    </div>
  </div>
  <div>


    {***Affichage des commentaires***}
    <div class="row">
      <div class="col-lg-6 center">
        <h5>Voici les commentaires pour cet article :</h5>
        {foreach $tab_article as $commentaire}
        <div class="card margin">
          <div class="card-body">
            <h5 class="card-title">{$commentaire.pseudo}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{$commentaire.email}</h6>
            <p class="card-text">{$commentaire.commentaire}</p>
          </div>
        </div>
        {/foreach}
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 text-center center">
        <h5>Ajouter un commentaire :</h5>
        <form action="article.php" method="post" enctype="multipart/form-data" id="form_ajout_commentaire">
          <div class="form-group">
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
          </div>
          <div class="form-group">
            <textarea id="commentaire" class="form-control" name="commentaire" placeholder="Votre commentaire..."></textarea>
          </div>
          <input type="hidden" class="col-lg-12" id="id_article" name="id_article" value="{$tab_article[0].id}">
          <button type="submit" class="btn btn-success center" name="ajoutCommentaire" value="ajoutCommentaire">Poster mon commentaire</button>
        </form>
      </div>
    </div>
  </div>
</div>
{/if}


{***Si type = modifier alors affichage de la page de modification d'un article***}
{if $type == "modifier"}

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"> Modifier un article</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="article.php" method="POST" enctype="multipart/form-data" id="form_article">

        <div class="form-group">
          <label for="titre" class="col-form-label">Titre</label>
          {foreach $tab_article as $article} {**Pour chaque article dans la tab_article**}
          <input type="texte" class="form-control" id="titre" name="titre" placeholder="Titre de votre article" value="{$article.titre}" required>{**Ajout du smarty avec $article.titre**}
        </div>

        <div class="form-group">
          <label for="texte" class="col-form-label">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required>{$article.texte}</textarea>{**Ajout du smarty avec $article.texte**}
        </div>

        <div class="form-group">
          <label for="texte" class="col-form-label">Date de création</label>
          <input class="form-control col-md-3 center text-center" readonly="readonly" type="text" id="date" name="date" value="{$article.date_fr}">
        </div>

        <div class="form-group">
          <label>Image actuelle</label>
          <img class="card-img-top" src="images/{$article.id}.jpg" alt="Pas d'image">
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input">
            <label class="custom-file-label" for="image">Choisir un fichier</label>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <label for="publie" class="form-check-label">
              {**onclick = js, permet de mettre à jour la valeur de "value" avec 0 ou 1**}
              <input class="form-check-input" type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="publie" id="publie" {if {$article.publie}==1} value="1" checked{/if}>Publié </label> </div> </div> <input type="hidden" id="id" name="id"
                value="{$article.id}">
              {/foreach}

              <button type="submit" class="btn btn-primary" name="modifier" value="modifier">Modifier l'article</button>
      </form>
    </div>
  </div>
</div>
{/if}



{***Si type = supprimer alors affichage de la page de suppression d'un article***}
{if $type == "supprimer"}

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

        <h1 class="mt-5"> Voulez-vous vraiment supprimer l'article ?</h1>

        {*On met l'ID de l'article dans un input hidden pour l'envoyer avec le formulaire*}
        <input type="hidden" id="id" name="id" value="{$id_art}">

        <a href="index.php" class="btn btn-success"> Non, ne pas supprimer l'article</a>
        <button type="submit" class="btn btn-danger" name="supprimer" value="supprimer"> Oui, supprimer l'article</button>
      </form>
    </div>
  </div>
  {/if}
