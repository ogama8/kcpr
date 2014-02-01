<?php /* Smarty version 2.6.26, created on 2011-01-11 18:21:12
         compiled from header.tpl */ ?>
<div id="header">
   <div id="picture">
      <table><tr><td>       </td></tr></table>

      <?php if (! isset ( $this->_tpl_vars['active'] )): ?><?php $this->assign('active', ""); ?><?php endif; ?>
      <ul class="headerList">
         <li><a 
         <?php if ($this->_tpl_vars['active'] == 'listen'): ?>class="active"<?php endif; ?>
          href="/listen">Listen Online</a>
         </li>

         <li><a href="/schedule"
          <?php if ($this->_tpl_vars['active'] == 'schedule'): ?>class="active"<?php endif; ?>
          >Schedule </a>
         </li>


         <li class="gap"><a 
          <?php if ($this->_tpl_vars['active'] == 'charts'): ?>class="active"<?php endif; ?>
          href="/charts">Charts </a>
         </li>

         <li><a 
          <?php if ($this->_tpl_vars['active'] == 'contact'): ?>class="active"<?php endif; ?>
          href="/contact">Contact </a>
         </li>

         <li><a 
          <?php if ($this->_tpl_vars['active'] == 'about'): ?>class="active"<?php endif; ?>
          href="/about"> About </a>
         </li>
      </ul>
      <div class="clearer"></div>
   </div>
   <div id="bar"></div>
</div>