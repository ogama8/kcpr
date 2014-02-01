<?php /* Smarty version 2.6.26, created on 2011-04-13 22:09:10
         compiled from admin/schedule.tpl */ ?>
<h2>Schedule</h2>


<form id="scheduleForm" method="post">

 <button type="button" id="timeButton"  
 class="picker" value="0:00">New Time</button>

<button type="button" id="clearButton">Clear Shows</button>
<input type="submit" value="Save Changes" />

<table id="schedule">
   <tr id="days">
      <th class="empty"> </th>
      <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day']):
?>
         <th><?php echo $this->_tpl_vars['day']; ?>
</th>
      <?php endforeach; endif; unset($_from); ?>
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
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['schedule']):
?>
            <td>

               <input type="hidden" 
                name="schedule[<?php echo $this->_tpl_vars['time']; ?>
][<?php echo $this->_tpl_vars['day']; ?>
][id]" 
                value="<?php echo $this->_tpl_vars['schedule']->id; ?>
" />

               <select name="schedule[<?php echo $this->_tpl_vars['time']; ?>
][<?php echo $this->_tpl_vars['day']; ?>
][showid]">
                  <option value=""> </option>
                  <?php $_from = $this->_tpl_vars['shows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['show']):
?>
                     <option 
                      <?php if ($this->_tpl_vars['show']->id == $this->_tpl_vars['schedule']->show_id): ?>
                         selected=selected
                      <?php endif; ?>
                      value="<?php echo $this->_tpl_vars['show']->id; ?>
"
                     >
                        <?php echo $this->_tpl_vars['show']->name; ?>

                     </option>
                  <?php endforeach; endif; unset($_from); ?>
               </select>

               <input class="deleteFlag" type="hidden" 
                name="schedule[<?php echo $this->_tpl_vars['time']; ?>
][<?php echo $this->_tpl_vars['day']; ?>
][delete]" value="" />

            </td>
         <?php endforeach; endif; unset($_from); ?>

         <td class="time"><?php echo $this->_tpl_vars['time']; ?>
</td>
         <td class="delLink"><a class="del">&nbsp;[x]</a></td>
      </tr>
   <?php endforeach; endif; unset($_from); ?>
</table>

</form>

<table>
   <tr class="time hidden" id="prototype">
      <td class="time"></td>
      <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['dayName']):
?>
         <td class="day" data-day="<?php echo $this->_tpl_vars['day']; ?>
">

            <input class="idPlaceholder" type="hidden" value="" />

            <select >
               <option value=""> </option>
               <?php $_from = $this->_tpl_vars['shows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['show']):
?>
                  <option value="<?php echo $this->_tpl_vars['show']->id; ?>
"><?php echo $this->_tpl_vars['show']->name; ?>
</option>
               <?php endforeach; endif; unset($_from); ?>
            </select>

            <input type="hidden" class="deleteFlag" value="" />

         </td>
      <?php endforeach; endif; unset($_from); ?>
      
      <td class="time"></td>
      <td class="delLink"><a class="del">&nbsp;[x]</a></td>
   </tr>
</table>