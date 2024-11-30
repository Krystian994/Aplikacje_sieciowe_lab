<?php
/* Smarty version 4.5.4, created on 2024-11-30 21:31:38
  from 'C:\xampp\htdocs\Php6\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.4',
  'unifunc' => 'content_674b762ab8de82_64625387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a9113a6662f3a89edb8dcb58e445ae85e1bc625' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Php6\\app\\views\\CalcView.tpl',
      1 => 1732998517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674b762ab8de82_64625387 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_452644155674b762ab71930_01287346', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_988059087674b762ab72844_62796967', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_452644155674b762ab71930_01287346 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_452644155674b762ab71930_01287346',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Kalkulator kredytowy<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_988059087674b762ab72844_62796967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_988059087674b762ab72844_62796967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator</h3>


	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post" >
		<div class="row mb-3">
			<label for="id_x" class="col-sm-2 col-form-label">Wartość kredytu:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="x" id="id_x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_liczbaMiesiecy" class="col-sm-2 col-form-label">Ilość miesięcy:</label>
			<div class="col-sm-3">
                            <input type="text" class="form-control" name="liczbaMiesiecy" id="id_liczbaMiesiecy" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->liczbaMiesiecy;?>
"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_oprocentowanie" class="col-sm-2 col-form-label">Stopa oprocentowania:</label>
			<div class="col-sm-3">
                            <input type="text" class="form-control" name="oprocentowanie" id="id_oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
"/>
			</div>
		</div>
		<input  type="submit" class="button primary" value="Oblicz" />
		<br>
	</form>


<div class="messages">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?> 
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Miesięczna rata kredytu</h4>
	<p class="res">
		Twoja miesięczna rata kredytu wynosi <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł.
	</p>
<?php }?>

</div>
<!-- Scripts -->
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/main.js"><?php echo '</script'; ?>
>
	
<?php
}
}
/* {/block 'content'} */
}
