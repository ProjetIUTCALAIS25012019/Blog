<?php
/* Smarty version 3.1.33, created on 2019-01-11 15:12:59
  from 'C:\wamp64\www\BlogV2\templates\inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c38b27b455d09_12859201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b43915454a88a930e3cc80e06ba8aaca69c4dacf' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\templates\\inscription.tpl',
      1 => 1547219578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38b27b455d09_12859201 (Smarty_Internal_Template $_smarty_tpl) {
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
               
                <div class ="form-group">
                    <label for="nom" class="col-form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="" required>    
                </div>
                <div class ="form-group">
                    <label for="prenom" class="col-form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" value="" required>    
                </div>
                <div class ="form-group">
                    <label for="email" class="col-form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com" value="" required>    
                </div>
                <div class ="form-group">
                    <label for="mdp" class="col-form-label">Entrez votre mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="" value="" required>    
                </div>

                
                <button type="submit" class="btn btn-primary" name="inscription_usr" value="inscription_usr">Créer votre compte</button>
            </form>
        </div>
    </div>
</div><?php }
}
