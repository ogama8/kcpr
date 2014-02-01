<?php /* Smarty version 2.6.26, created on 2011-05-04 16:54:02
         compiled from admin/admin_layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'URI', 'admin/admin_layout.tpl', 14, false),)), $this); ?>
<html>
<head>

    
   <link href="/ci/css/admin/admin_base.css" rel="stylesheet" type="text/css">

   <?php echo $this->_tpl_vars['_styles']; ?>


</head>

<div id="headerContainer">
   <div id="adminHeader">
      <span style="float: right; margin-right: 1em;">
         <a href="<?php echo smarty_function_URI(array('adminPage' => 'logout'), $this);?>
">logout</a>
      </span>

      <ul>
         <li class="single">
            <a href="<?php echo smarty_function_URI(array('adminPage' => 'news'), $this);?>
">News</a>
         </li>

         <li class="menu">Charts
            <ul>
               <li><a href="<?php echo smarty_function_URI(array('adminPage' => 'new_charts'), $this);?>
">Add Charts</a></li>
               <li><a href="<?php echo smarty_function_URI(array('adminPage' => 'edit_charts'), $this);?>
">Edit Charts</a></li>
            </ul>
         </li>
         
         <li class="menu">Schedule
            <ul> 
               <li><a href="<?php echo smarty_function_URI(array('adminPage' => 'shows'), $this);?>
">Add Shows</a></li>
               <li><a href="<?php echo smarty_function_URI(array('adminPage' => 'schedule'), $this);?>
">Edit Schedule</a></li>
            </ul>
         </li>

      </ul>

      <div class="clearer"></div>
   </div>
</div>

<div id="errorContainer">
   <?php if (! empty ( $this->_tpl_vars['error'] )): ?>
      <p><?php echo $this->_tpl_vars['error']; ?>
</p>
   <?php endif; ?>
</div>

<div id="messageContainer">
   <?php if (! empty ( $this->_tpl_vars['message'] )): ?>
      <p><?php echo $this->_tpl_vars['message']; ?>
</p>
   <?php endif; ?>
</div>

<div id="contentContainer">
   <?php echo $this->_tpl_vars['content']; ?>

</div>

<body>

<script type="text/javascript" src="/ci/js/mootools-core.js"></script>
<script type="text/javascript" src="/ci/js/mootools-more.js"></script>
<script type="text/javascript" src="/ci/js/dropdowns.js"></script>
<?php echo $this->_tpl_vars['_scripts']; ?>


</body>

</html>