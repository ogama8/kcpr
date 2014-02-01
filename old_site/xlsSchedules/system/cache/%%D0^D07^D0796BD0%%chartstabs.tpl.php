<?php /* Smarty version 2.6.26, created on 2012-09-26 16:44:22
         compiled from chartstabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'URI', 'chartstabs.tpl', 5, false),)), $this); ?>
<ul class="tabList">
   <?php if (! isset ( $this->_tpl_vars['chartsTab'] )): ?><?php $this->assign('chartsTab', ""); ?><?php endif; ?>
   <li><a 
    <?php if ($this->_tpl_vars['chartsTab'] == 'charts'): ?>class="active"<?php endif; ?>
    href="<?php echo smarty_function_URI(array('page' => 'charts'), $this);?>
">This Week's Charts</a>
   </li>

   <li> <a 
     <?php if ($this->_tpl_vars['chartsTab'] == 'archives'): ?>class="active"<?php endif; ?>
     href="<?php echo smarty_function_URI(array('page' => 'archives'), $this);?>
">Archives</a>
   </li>
</ul>
<div class="clearer"></div>
<div id="tabBar"></div>