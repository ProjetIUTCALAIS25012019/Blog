<?php
/* Smarty version 3.1.33, created on 2019-02-11 18:35:51
  from 'C:\wamp64\www\BlogV2\tpl\inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c61c0871e7d35_71020527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a8d0e391bd02bc9a503839147b1a4cf3bdeea75' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\tpl\\inscription.tpl',
      1 => 1549908002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c61c0871e7d35_71020527 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Contenu de la page -->
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
<?php }
}
