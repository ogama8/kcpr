<?php /* Smarty version 2.6.26, created on 2012-09-26 17:19:44
         compiled from schedule.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtotime', 'schedule.tpl', 16, false),array('modifier', 'date_format', 'schedule.tpl', 16, false),)), $this); ?>
<table id="schedule">
   <tr id="days">
      <th class="empty"> </th>
      <th>Sun</th>
      <th>Mon</th>
      <th>Tues</th>
      <th>Wed</th>
      <th>Thurs</th>
      <th>Fri</th>
      <th>Sat</th>
      <th class="empty"> </th>
   </tr>

   <?php $_from = $this->_tpl_vars['schedule']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['time'] => $this->_tpl_vars['days']):
?>
      <tr data-time="<?php echo $this->_tpl_vars['time']; ?>
" class="time time<?php echo $this->_tpl_vars['time']; ?>
">
         <td class="time"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['time'])) ? $this->_run_mod_handler('strtotime', true, $_tmp) : strtotime($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M%p") : smarty_modifier_date_format($_tmp, "%l:%M%p")); ?>
</td>
         <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['spot']):
?>
            <td class="show type<?php echo $this->_tpl_vars['spot']->show->type; ?>
"
             data-id="<?php echo $this->_tpl_vars['spot']->show->id; ?>
"
             rowspan="<?php echo $this->_tpl_vars['spot']->blocks; ?>
">
               <?php echo $this->_tpl_vars['spot']->show->name; ?>

            </td>
         <?php endforeach; endif; unset($_from); ?>
         <td class="time"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['time'])) ? $this->_run_mod_handler('strtotime', true, $_tmp) : strtotime($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M%p") : smarty_modifier_date_format($_tmp, "%l:%M%p")); ?>
</td>
      </tr>
   <?php endforeach; endif; unset($_from); ?>

</table>