<?php /* Smarty version 2.6.26, created on 2010-08-22 23:10:28
         compiled from admin/edit_charts.tpl */ ?>
<p>Which charts do you want to edit?</p>
<ul>
<?php $_from = $this->_tpl_vars['dates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['date']):
?>
   <li><a href="<?php echo $this->_tpl_vars['date']['link']; ?>
"><?php echo $this->_tpl_vars['date']['month']; ?>
-<?php echo $this->_tpl_vars['date']['day']; ?>
-<?php echo $this->_tpl_vars['date']['year']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>