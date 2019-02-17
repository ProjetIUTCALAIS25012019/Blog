<!-- Contenu de la page -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"> Créer votre compte</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="inscription.php" method="post" enctype="multipart/form-data" id="form_inscription">

        <div class="form-group">
          <label for="nom" class="col-form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="" required>
        </div>
        <div class="form-group">
          <label for="prenom" class="col-form-label">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" value="" required>
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Adresse mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" value="" required>
        </div>
        <div class="form-group">
          <label for="mdp" class="col-form-label">Entrez votre mot de passe</label>
          <input type="password" class="form-control" id="mdp" name="mdp" placeholder="" value="" required>
        </div>

        <button type="submit" class="btn btn-primary" name="inscription_usr" value="inscription_usr">Créer votre compte</button>
      </form>
    </div>
  </div>
</div>
