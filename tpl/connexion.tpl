<!-- Contenu de la page -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"> Connexion</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 text-center center">
      <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion">
        <div class="form-group">
          <label for="email" class="col-form-label">Adresse mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" value="" required>
        </div>
        <div class="form-group">
          <label for="mdp" class="col-form-label">Mot de passe</label>
          <input type="password" class="form-control" id="mdp" name="mdp" placeholder="" value="" required>
        </div>
        <button type="submit" class="btn btn-primary" name="connexion_usr" value="connexion_usr"> Connexion</button>
      </form>
    </div>
  </div>
</div>
