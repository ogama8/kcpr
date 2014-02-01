<?php /* Smarty version 2.6.26, created on 2010-09-12 02:39:14
         compiled from admin/login.tpl */ ?>
<?php if (! isset ( $this->_tpl_vars['errorMsg'] )): ?>
   <?php echo $this->_tpl_vars['greeting']; ?>
 
<?php else: ?>
   <?php echo $this->_tpl_vars['errorMsg']; ?>

<?php endif; ?>
<form method="post">
User: <input type="text" name="user" />
Password: <input type="password" name="pword" />
<input type="submit" value="Login" />
</form>