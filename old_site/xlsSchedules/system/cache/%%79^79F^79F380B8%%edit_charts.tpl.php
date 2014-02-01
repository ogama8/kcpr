<?php /* Smarty version 2.6.26, created on 2011-05-04 16:43:00
         compiled from admin/edit_charts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'URI', 'admin/edit_charts.tpl', 5, false),)), $this); ?>
<p>Which charts do you want to edit?</p>
<ul>
<?php $_from = $this->_tpl_vars['dates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['date']):
?>
   <li>
    <a href="<?php echo smarty_function_URI(array('adminPage' => 'edit_charts','param' => $this->_tpl_vars['date']['link']), $this);?>
"><?php echo $this->_tpl_vars['date']['month']; ?>
-<?php echo $this->_tpl_vars['date']['day']; ?>
-<?php echo $this->_tpl_vars['date']['year']; ?>
</a>
   </li>
<?php endforeach; endif; unset($_from); ?>
</ul>