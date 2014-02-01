<?php /* Smarty version 2.6.26, created on 2010-08-27 12:28:05
         compiled from base.tpl */ ?>
<html>
<body> 

<div id="headerContainer">
   <?php $_from = $this->_tpl_vars['header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['template']):
?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php endforeach; endif; unset($_from); ?>
</div>

<div id="contentContainer">

   <?php if (count ( $this->_tpl_vars['sidebar'] )): ?>
   <div id="sidebarContainer">
   <?php $_from = $this->_tpl_vars['sidebar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['template']):
?>
      <div class="sidebar"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <?php if ($this->_tpl_vars['num'] != count ( $this->_tpl_vars['sidebar'] )): ?><hr noshade /><?php endif; ?>
   <?php endforeach; endif; unset($_from); ?>
   </div>
   <?php endif; ?>

   <div id="mainContainer" <?php if ($this->_tpl_vars['fullWidth']): ?>class="fullWidth"<?php endif; ?>>
   <?php $_from = $this->_tpl_vars['main']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['template']):
?>
      <div class="main"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
   <?php endforeach; endif; unset($_from); ?>
   </div>

   <div class="clearer"></div>
</div>

<div id="footerContainer">
   <?php $_from = $this->_tpl_vars['footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['template']):
?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php endforeach; endif; unset($_from); ?>
</div>

<?php $_from = $this->_tpl_vars['stylesheets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stylesheet']):
?>
   <link rel="stylesheet" type="text/css" href="/templates/css/<?php echo $this->_tpl_vars['stylesheet']; ?>
" />
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['script']):
?>
   <script type="text/javascript" src="/templates/js/<?php echo $this->_tpl_vars['script']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
</body>
</html>