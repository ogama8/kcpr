<?php /* Smarty version 2.6.26, created on 2012-04-28 10:19:16
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'footer.tpl', 6, false),)), $this); ?>
<div>
<a>Cal Poly</a> : <a>College of Liberal Arts</a> : <a>Journalism Dept.</a>
</div>

<div>
&copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 KCPR 91.3fm, San Luis Obispo, CA
</div>