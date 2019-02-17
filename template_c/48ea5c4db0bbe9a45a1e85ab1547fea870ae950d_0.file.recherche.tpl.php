<?php
/* Smarty version 3.1.33, created on 2019-02-12 23:27:12
  from 'C:\wamp64\www\BlogV2\tpl\recherche.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c635650800235_90898850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48ea5c4db0bbe9a45a1e85ab1547fea870ae950d' => 
    array (
      0 => 'C:\\wamp64\\www\\BlogV2\\tpl\\recherche.tpl',
      1 => 1550014031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c635650800235_90898850 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Contenu de la page -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Résultat de votre recherche</h1>
    </div>
  </div>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
    <div class="col-lg-12 text-center">
      <div class="col-md-6 card margin">
        <img class="card-img-top"  src="images/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
.jpg" alt="Pas d'image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
</h5>
          <p><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</p>
          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['article']->value['date_fr'];?>
</p>
        </div>
          </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <a href="index.php" class="btn btn-secondary">Retour</a>
      </div>
    </div>
<?php }
}
