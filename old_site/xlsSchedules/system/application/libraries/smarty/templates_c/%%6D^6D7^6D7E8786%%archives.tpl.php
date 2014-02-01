<?php /* Smarty version 2.6.26, created on 2010-10-01 15:22:28
         compiled from archives.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'archives.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "chartstabs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p>
<?php $_from = $this->_tpl_vars['dates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['yearNum'] => $this->_tpl_vars['year']):
?>
   <h2 class="yearbanner">Charts for <?php echo $this->_tpl_vars['yearNum']; ?>
</h2>
   <div class="archives">
      <table> <tr> 
      
      <?php $_from = $this->_tpl_vars['year']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['monthNum'] => $this->_tpl_vars['month']):
?>
         <td> <ul>
         <?php $_from = $this->_tpl_vars['month']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['chart']):
?>

            <li><a href="index?date=<?php echo $this->_tpl_vars['chart']['year']; ?>
-<?php echo $this->_tpl_vars['chart']['month']; ?>
-<?php echo $this->_tpl_vars['chart']['day']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['chart']['unixtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %d") : smarty_modifier_date_format($_tmp, "%b %d")); ?>
</a></li>
               
         <?php endforeach; endif; unset($_from); ?>
         </ul> </td> 
      <?php endforeach; endif; unset($_from); ?>

      </tr> </table> 
   </div>
<?php endforeach; endif; unset($_from); ?>
</p>