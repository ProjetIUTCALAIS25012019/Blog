{*Page mode connecté*}
{if $is_connect == TRUE}
<!-- Contenu de la page -->
<div class="container">
  <div class="row">
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

    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Blog BMW</h1>
      <p class="lead">Bienvenue sur le blog BMW, partage nous ta voiture via l'onglet 'Ajout d'article' !</p>
      <br>
    </div>


    {foreach $tab_articles as $article}
    <div class="col-md-6 margin">
      <div class="card">
        <img class="card-img-top" src="images/{$article.id}.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title">{$article.titre}</h5>
          <p class="card-text"><b>Article publié ? {if {$article.publie}==1}Oui{else}Non{/if}</b></p>
          <p>{$article.texte}</p>
          <p class="card-text">{$article.date_fr}</p>
          <a href="article.php?type=modifier&id={$article.id}" class="btn btn-warning">Modifier l'article</a>
          <a href="article.php?type=supprimer&id={$article.id}" class="btn btn-danger">Supprimer l'article</a>
          <a href="article.php?type=afficherplus&id={$article.id}" class="btn btn-secondary ">Afficher la suite</a>
        </div>
      </div>
    </div>
    {/foreach}

    <!--Pagination-->
    <div class="col-lg-12 text-center">
      <nav aria-label="Page_navigation">
        <ul class="pagination pagination-lg justify-content-center">
          {for $i=1 to $nb_pages_total}
          <li class="page-item"><a class="page-link" href="index.php?page={$i}">{$i}</a></li>
          {/for}
        </ul>
      </nav>
    </div>
  </div>
</div>
{/if}


{*Page mode non connecté*}
{if $is_connect == FALSE}
<!-- Contenu de la page -->
<div class="container">
  <div class="row">
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

    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Blog BMW</h1>
      <p class="lead">Bienvenue sur le blog BMW, partage nous ta voiture via l'onglet 'Ajout d'article' !</p>
      <br>
    </div>


    {foreach $tab_articles as $article}
    <div class="col-md-6 margin">
      <div class="card">
        <img class="card-img-top" src="images/{$article.id}.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title">{$article.titre}</h5>
          <p>{$article.texte}</p>
          <p class="card-text">{$article.date_fr}</p>
          <a href="article.php?type=afficherplus&id={$article.id}" class="btn btn-secondary ">Afficher la suite</a>
        </div>
      </div>
    </div>
    {/foreach}


    <!--Pagination-->
    <div class="col-lg-12 text-center">
      <nav aria-label="Page_navigation">
        <ul class="pagination pagination-lg justify-content-center">
          {for $i=1 to $nb_pages_publie}
          <li class="page-item"><a class="page-link" href="index.php?page={$i}">{$i}</a></li>
          {/for}
        </ul>
      </nav>
    </div>
  </div>
</div>
{/if}
