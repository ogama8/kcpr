<?php /* Smarty version 2.6.26, created on 2012-09-27 15:39:28
         compiled from sidebar/topten.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sidebar/topten.tpl', 2, false),)), $this); ?>
<div class="sidebar">
   <h3>Top Ten <?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%Y") : smarty_modifier_date_format($_tmp, "%m/%d/%Y")); ?>
</h3>

   <ol>
   <?php $_from = $this->_tpl_vars['topten']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chart']):
?>
      <li><?php echo $this->_tpl_vars['chart']->artist; ?>
 </li>
   <?php endforeach; endif; unset($_from); ?>
   </ol>
</div>