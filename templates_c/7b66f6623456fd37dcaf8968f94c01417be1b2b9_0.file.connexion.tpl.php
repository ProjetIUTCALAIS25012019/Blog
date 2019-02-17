<?php
/* Smarty version 3.1.33, created on 2019-02-17 11:46:12
  from 'C:\wamp64\www\BlogV2\tpl\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6949849c2817_88750251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b66f6623456fd37dcaf8968f94c01417be1b2b9' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\tpl\\connexion.tpl',
      1 => 1550403838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6949849c2817_88750251 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Contenu de la page -->
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
<?php }
}
