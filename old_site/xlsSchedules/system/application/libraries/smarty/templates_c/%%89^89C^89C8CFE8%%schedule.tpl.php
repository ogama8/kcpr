<?php /* Smarty version 2.6.26, created on 2010-10-03 21:59:50
         compiled from schedule.tpl */ ?>
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
         <td class="time"><?php echo $this->_tpl_vars['time']; ?>
</td>
         <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['show']):
?>
            <td class="show type<?php echo $this->_tpl_vars['show']['type']; ?>
"
             data-id="<?php echo $this->_tpl_vars['show']['showid']; ?>
"
             rowspan="<?php echo $this->_tpl_vars['show']['blocks']; ?>
">
               <?php echo $this->_tpl_vars['show']['name']; ?>

            </td>
         <?php endforeach; endif; unset($_from); ?>
         <td class="time"><?php echo $this->_tpl_vars['time']; ?>
</td>
      </tr>
   <?php endforeach; endif; unset($_from); ?>

</table>