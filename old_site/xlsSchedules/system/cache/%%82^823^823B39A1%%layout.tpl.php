<?php /* Smarty version 2.6.26, created on 2012-09-27 16:15:53
         compiled from layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'URI', 'layout.tpl', 6, false),)), $this); ?>
<html>
<head>
   <title>KCPR 91.3fm<?php if (! empty ( $this->_tpl_vars['title'] )): ?> - <?php echo $this->_tpl_vars['title']; ?>
<?php endif; ?></title>

    
   <link href="<?php echo smarty_function_URI(array('css' => "type/stylesheet.css"), $this);?>
" rel="stylesheet" type="text/css">
   <link href="<?php echo smarty_function_URI(array('css' => "base.css"), $this);?>
" rel="stylesheet" type="text/css">
   <?php echo $this->_tpl_vars['_styles']; ?>

</head>
<body> 

<div id="topPicture"> </div>
<div class="" id="topBlock"> </div>
<div class="rotate" id="bottomBlock"> </div>

<div id="headerContainer">
   <div id="header">
      <a href="<?php echo smarty_function_URI(array('page' => 'home'), $this);?>
"><img src="/images/kcprbanner2.png" id="picture" /></a>
      <div class="clearer"></div>

      <?php if (! isset ( $this->_tpl_vars['section'] )): ?><?php $this->assign('section', ""); ?><?php endif; ?>
      <div class="rotate" id="navigation">
         <ul class="headerList">
            <li><a href="<?php echo smarty_function_URI(array('page' => 'schedule'), $this);?>
"
             <?php if ($this->_tpl_vars['active'] == 'schedule'): ?>class="active"<?php endif; ?>
             >Schedule</a>
            </li>

            <li class="gap"><a 
             <?php if ($this->_tpl_vars['active'] == 'charts'): ?>class="active"<?php endif; ?>
             href="<?php echo smarty_function_URI(array('page' => 'charts'), $this);?>
">Charts </a>
            </li>

            <li><a 
             <?php if ($this->_tpl_vars['active'] == 'contact'): ?>class="active"<?php endif; ?>
             href="<?php echo smarty_function_URI(array('page' => 'contact'), $this);?>
">Contact </a>
            </li>

            <li><a 
             <?php if ($this->_tpl_vars['active'] == 'about'): ?>class="active"<?php endif; ?>
             href="<?php echo smarty_function_URI(array('page' => 'about'), $this);?>
"> About </a>
            </li>

            <li><a 
            <?php if ($this->_tpl_vars['active'] == 'listen'): ?>class="active"<?php endif; ?>
             href="<?php echo smarty_function_URI(array('page' => 'listen'), $this);?>
">Listen Online</a>
            </li>

         </ul>
      </div>
   </div>
</div>

<div id="contentContainer">

   <div id="sidebarContainer">
      <?php echo $this->_tpl_vars['sidebar']; ?>

   </div>

   <div id="mainContainer" <?php if (empty ( $this->_tpl_vars['sidebar'] )): ?>class="fullWidth"<?php endif; ?>>
      <?php echo $this->_tpl_vars['content']; ?>

   </div>

   <div class="clearer"></div>
</div>

<div id="footerContainer">
   <div class="tiny">
      <div>
      <a href="http://www.calpoly.edu" target="_blank">Cal Poly</a> : 
      <a href="http://cla.calpoly.edu" target="_blank">College of Liberal Arts</a> : 
      <a href="http://cla.calpoly.edu/jour" target="_blank">Journalism Dept.</a>
      </div>

      <div>
      &copy;  2011 KCPR 91.3fm, San Luis Obispo, CA
      </div>
   </div>
</div>

<script type="text/javascript" src="<?php echo smarty_function_URI(array('js' => "mootools-core.js"), $this);?>
"></script>
<script type="text/javascript" src="<?php echo smarty_function_URI(array('js' => "mootools-more.js"), $this);?>
></script>
<?php echo $this->_tpl_vars['_scripts']; ?>


</body>
</html>