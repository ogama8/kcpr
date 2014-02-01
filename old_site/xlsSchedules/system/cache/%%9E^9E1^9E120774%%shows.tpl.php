<?php /* Smarty version 2.6.26, created on 2011-04-13 22:10:14
         compiled from admin/shows.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'admin/shows.tpl', 22, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['message'] )): ?>
   <span class="msg"><?php echo $this->_tpl_vars['message']; ?>
</span>
<?php endif; ?>

<h2>Shows</h2>

<form method="post" id="inputForm">

<ul class="tabList">
   <?php if (! isset ( $this->_tpl_vars['activeTab'] )): ?><?php $this->assign('activeTab', 'all'); ?><?php endif; ?>
   <li data-typeName="all"> 
      <a id="showAll"
       <?php if ($this->_tpl_vars['activeTab'] == 'all'): ?>class="active"<?php endif; ?>>
          All Shows
      </a>
   </li>

   <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
      <li data-typeName="<?php echo $this->_tpl_vars['type']; ?>
"> 
         <a 
          <?php if ($this->_tpl_vars['activeTab'] == "\"{".($this->_tpl_vars['type'])): ?>"}class="active"<?php endif; ?>>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
   
         </a>
      </li>
   <?php endforeach; endif; unset($_from); ?>
</ul>

<div id="toolbar">
   <input id="newShow" type="button" value="New Show" />
   <input id="saveShows" type="submit" value="Save Changes" />
</div>

<div class="clearer"></div>
<div id="tabBar"></div>
   
<table id="showTable">
   <tr id="headerRow">
      <th>Name</th>
      <th>Type
         <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['typeNum'] => $this->_tpl_vars['typeName']):
?>
            <div class="typeData hidden" 
             data-typeName="<?php echo $this->_tpl_vars['typeName']; ?>
"
             data-typeNum="<?php echo $this->_tpl_vars['typeNum']; ?>
"
             >
         <?php endforeach; endif; unset($_from); ?>
      </th>
      <th>Genre</th>
      <th>Description</th>
   </tr>

   <?php $_from = $this->_tpl_vars['shows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['show']):
?>
      <tr class="<?php echo $this->_tpl_vars['show']->typeName(); ?>
">
         <input type="hidden" name="shows[id][]" value="<?php echo $this->_tpl_vars['show']->id; ?>
" />
         <input type="hidden" name="shows[delete][]" class="deleteFlag" value="" />

         <td>
            <input type="text" name="shows[name][]" value="<?php echo $this->_tpl_vars['show']->name; ?>
" />
         </td>

         <td>
            <select name="shows[type][]">
               <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['typeNum'] => $this->_tpl_vars['typeName']):
?>
                  <option data-typeName="<?php echo $this->_tpl_vars['typeName']; ?>
" value="<?php echo $this->_tpl_vars['typeNum']; ?>
"
                   <?php if ($this->_tpl_vars['typeNum'] == $this->_tpl_vars['show']->type): ?> selected="selected" <?php endif; ?>>
                     <?php echo ((is_array($_tmp=$this->_tpl_vars['typeName'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 
                  </option> 
               <?php endforeach; endif; unset($_from); ?>
            </select>
         </td>

         <td>
            <input type="text" name="shows[genre][]" value="<?php echo $this->_tpl_vars['show']->genre; ?>
" />
         </td>

         <td class="description">
            <input class="description" name="shows[description][]" 
             type="text" value="<?php echo $this->_tpl_vars['show']->description; ?>
" />
         </td>

         <td><a class="deleteShow">[x]</a></td>
      </tr>
   <?php endforeach; endif; unset($_from); ?>
</table>

</form>

<table>
<tr id="prototype" class="hidden">
      <input type="hidden" name="shows[id][]" value="" />
      <input type="hidden" name="shows[delete][]" class="deleteFlag" value="" />

      <td>
         <input type="text" name="shows[name][]" value=" "/>
      </td>

      <td>
         <select name="shows[type][]">
            <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['typeNum'] => $this->_tpl_vars['typeName']):
?>
               <option data-typeName="<?php echo $this->_tpl_vars['typeName']; ?>
" value="<?php echo $this->_tpl_vars['typeNum']; ?>
">
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['typeName'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 
               </option> 
            <?php endforeach; endif; unset($_from); ?>
         </select>
      </td>

      <td>
         <input type="text" name="shows[genre][]" />
      </td>

      <td class="description">
         <input class="description" name="shows[description][]" type="text" />
      </td>

      <td><a class="deleteShow">[x]</a></td>
</tr>
</table>