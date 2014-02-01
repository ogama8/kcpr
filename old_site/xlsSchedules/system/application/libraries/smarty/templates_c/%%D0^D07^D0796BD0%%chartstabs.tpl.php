<?php /* Smarty version 2.6.26, created on 2010-10-03 22:15:59
         compiled from chartstabs.tpl */ ?>
<ul class="tabList">
   <?php if (! isset ( $this->_tpl_vars['chartsTab'] )): ?><?php $this->assign('chartsTab', ""); ?><?php endif; ?>
   <li><a 
    <?php if ($this->_tpl_vars['chartsTab'] == 'charts'): ?>class="active"<?php endif; ?>
    href="/charts">This Week's Charts</a>
   </li>

   <li> <a 
     <?php if ($this->_tpl_vars['chartsTab'] == 'archives'): ?>class="active"<?php endif; ?>
     href="/charts/archives">Archives</a>
   </li>
</ul>
<div class="clearer"></div>
<div id="tabBar"></div>