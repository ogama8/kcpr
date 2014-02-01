<?php /* Smarty version 2.6.26, created on 2010-09-22 13:39:54
         compiled from sidebar/topten.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sidebar/topten.tpl', 1, false),)), $this); ?>
<h5>Top Plays for the week (<?php echo ((is_array($_tmp=$this->_tpl_vars['week'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y") : smarty_modifier_date_format($_tmp, "%m/%d/%Y")); ?>
)</h5>
<ol class="topten">
<?php $_from = $this->_tpl_vars['charts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chart']):
?>
   <li><?php echo $this->_tpl_vars['chart']['artist']; ?>
 </li>
<?php endforeach; endif; unset($_from); ?>
</ol>