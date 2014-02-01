<?php /* Smarty version 2.6.26, created on 2010-10-15 15:56:32
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'footer.tpl', 9, false),)), $this); ?>
<div class="tiny">
   <div>
   <a href="http://www.calpoly.edu" target="_blank">Cal Poly</a> : 
   <a href="http://cla.calpoly.edu" target="_blank">College of Liberal Arts</a> : 
   <a href="http://cla.calpoly.edu/jour" target="_blank">Journalism Dept.</a>
   </div>

   <div>
   &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 KCPR 91.3fm, San Luis Obispo, CA
   </div>
</div>