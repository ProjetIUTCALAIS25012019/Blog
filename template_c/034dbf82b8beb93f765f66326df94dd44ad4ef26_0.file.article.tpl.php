<?php
/* Smarty version 3.1.33, created on 2019-02-17 11:45:44
  from 'C:\wamp64\www\BlogV2\tpl\article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c694968c0d492_34972451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '034dbf82b8beb93f765f66326df94dd44ad4ef26' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\tpl\\article.tpl',
      1 => 1550403942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c694968c0d492_34972451 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php if ($_smarty_tpl->tpl_vars['type']->value == "defaut") {?>
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
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['type']->value == "afficherplus") {?>

<div class="container">

  <div class="col-lg-12 text-center">
    <?php if (isset($_smarty_tpl->tpl_vars['session_var']->value['notifications'])) {?>
    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['color'];?>
 alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
      <?php echo $_smarty_tpl->tpl_vars['session_var']->value['notifications']['message'];?>

    </div>
    <?php }?>
  </div>

  <div class="row">
            <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['titre'];?>
</h1>
    </div>
        <div class="col-lg-6 text-center center">
      <img class="card-img-top" src="images/<?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['id'];?>
.jpg" alt="Pas d'image">
    </div>
        <div class="col-lg-12 text-center">
      <p><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['date_fr'];?>
</p>
    </div>
        <div class="col-lg-12 text-center">
      <p><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['texte'];?>
</p>
    </div>
        <div class="col-lg-12 text-center">
      <a class="btn btn-primary margin" href="index.php"> Accueil</a>
    </div>
  </div>
  <div>


        <div class="row">
      <div class="col-lg-6 center">
        <h5>Voici les commentaires pour cet article :</h5>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'commentaire');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['commentaire']->value) {
?>
        <div class="card margin">
          <div class="card-body">
            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['commentaire']->value['pseudo'];?>
</h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_smarty_tpl->tpl_vars['commentaire']->value['email'];?>
</h6>
            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['commentaire']->value['commentaire'];?>
</p>
          </div>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
          <input type="hidden" class="col-lg-12" id="id_article" name="id_article" value="<?php echo $_smarty_tpl->tpl_vars['tab_article']->value[0]['id'];?>
">
          <button type="submit" class="btn btn-success center" name="ajoutCommentaire" value="ajoutCommentaire">Poster mon commentaire</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['type']->value == "modifier") {?>

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
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>           <input type="texte" class="form-control" id="titre" name="titre" placeholder="Titre de votre article" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
" required>        </div>

        <div class="form-group">
          <label for="texte" class="col-form-label">Texte</label>
          <textarea class="form-control" id="texte" name="texte" rows="3" required><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</textarea>        </div>

        <div class="form-group">
          <label for="texte" class="col-form-label">Date de création</label>
          <input class="form-control col-md-3 center text-center" readonly="readonly" type="text" id="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['date_fr'];?>
">
        </div>

        <div class="form-group">
          <label>Image actuelle</label>
          <img class="card-img-top" src="images/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
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
                            <input class="form-check-input" type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="publie" id="publie" <?php ob_start();
echo $_smarty_tpl->tpl_vars['article']->value['publie'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 1) {?> value="1" checked<?php }?>>Publié </label> </div> </div> <input type="hidden" id="id" name="id"
                value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

              <button type="submit" class="btn btn-primary" name="modifier" value="modifier">Modifier l'article</button>
      </form>
    </div>
  </div>
</div>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['type']->value == "supprimer") {?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center center">
      <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

        <h1 class="mt-5"> Voulez-vous vraiment supprimer l'article ?</h1>

                <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id_art']->value;?>
">

        <a href="index.php" class="btn btn-success"> Non, ne pas supprimer l'article</a>
        <button type="submit" class="btn btn-danger" name="supprimer" value="supprimer"> Oui, supprimer l'article</button>
      </form>
    </div>
  </div>
  <?php }
}
}
