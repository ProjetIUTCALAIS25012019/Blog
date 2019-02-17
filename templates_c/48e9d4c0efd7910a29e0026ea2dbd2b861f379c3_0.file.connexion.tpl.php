<?php
/* Smarty version 3.1.33, created on 2019-01-11 15:23:16
  from 'C:\wamp64\www\BlogV2\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c38b4e4a0d327_35082513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48e9d4c0efd7910a29e0026ea2dbd2b861f379c3' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\templates\\connexion.tpl',
      1 => 1547219680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38b4e4a0d327_35082513 (Smarty_Internal_Template $_smarty_tpl) {
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

<p></p>
<?php }
}
