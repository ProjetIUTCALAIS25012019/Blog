<!-- Contenu de la page -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Résultat de votre recherche</h1>
    </div>
  </div>
      {foreach $tab_articles as $article}
    <div class="col-lg-12 text-center">
      <div class="col-md-6 card margin">
        <img class="card-img-top"  src="images/{$article.id}.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title">{$article.titre}</h5>
          <p>{$article.texte}</p>
          <p class="card-text">{$article.date_fr}</p>
        </div>
          </div>
        {/foreach}
          <a href="index.php" class="btn btn-secondary">Retour</a>
      </div>
    </div>
