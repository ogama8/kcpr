<?php /* Smarty version 2.6.26, created on 2010-08-22 23:10:30
         compiled from admin/charts.tpl */ ?>
<div style="float: left; width: 500px; margin-right: 40px"> 
<?php if (isset ( $this->_tpl_vars['msg'] )): ?> <?php echo $this->_tpl_vars['msg']; ?>
 <?php endif; ?>

<p>What would you like to do regarding Charts &amp Adds?</p>
<ul>
<li><a href="simple_charts">Create charts/adds manually</a></li>
<li><a href="edit">Edit charts/adds</a></li>
</ul>
</div>
<?php if (isset ( $this->_tpl_vars['charts'] )): ?>
Here's the new charts for easy copy/pasting:
<textarea cols='90' rows='35' 
 name='charts'><?php echo $this->_tpl_vars['charts']; ?>
</textarea>
<?php endif; ?>