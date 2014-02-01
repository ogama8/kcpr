<?php /* Smarty version 2.6.26, created on 2010-09-24 14:41:45
         compiled from admin/show.tpl */ ?>
<div style="float: left">
   <h2>Shows</h2>
   <form id="inputForm" name="shows">
   <label>Name:&nbsp;</label><input name="name" type="text" />
   <label>Type:&nbsp;</label>
      <select name="type">
         <option value="0">Regular Format</option>
         <option value="1">Special Format</option>
         <option value="2">Re-broadcasted</option>
      </select>

   <button type="submit">Add</button>
   </form>

   <form id="outputForm" method="post">
      <?php $_from = $this->_tpl_vars['schedule']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['time'] => $this->_tpl_vars['days']):
?>
         <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['show']):
?>
            <input class="hidden" id="schedule<?php echo $this->_tpl_vars['show']['day']; ?>
<?php echo $this->_tpl_vars['time']; ?>
" 
             value=<?php echo $this->_tpl_vars['show']['showid']; ?>
 name="schedule[<?php echo $this->_tpl_vars['show']['day']; ?>
][<?php echo $this->_tpl_vars['time']; ?>
]"
             type="text" />
         <?php endforeach; endif; unset($_from); ?>
      <?php endforeach; endif; unset($_from); ?>
   <ul>
      <?php $_from = $this->_tpl_vars['shows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['show']):
?>
         <li data-id="<?php echo $this->_tpl_vars['show']['showid']; ?>
"
                   >

            <span data-id="<?php echo $this->_tpl_vars['show']['showid']; ?>
" class="fancyShow type<?php echo $this->_tpl_vars['show']['type']; ?>
">
               <?php echo $this->_tpl_vars['show']['name']; ?>

            </span>
         </li>

         <div id="item<?php echo $this->_tpl_vars['show']['showid']; ?>
">
            <?php $_from = $this->_tpl_vars['show']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
?>
               <input type="text" class="hidden"          
                data-id="<?php echo $this->_tpl_vars['show']['showid']; ?>
"
                name="shows[<?php echo $this->_tpl_vars['show']['showid']; ?>
][<?php echo $this->_tpl_vars['col']; ?>
]"
                value="<?php echo $this->_tpl_vars['value']; ?>
"
                 />
            <?php endforeach; endif; unset($_from); ?>
         </div>
      <?php endforeach; endif; unset($_from); ?>
   </ul>
   <button type="submit">Save</button>
   </form>

</div>
<div class="bar"> </div>
<div style="float: left;">
   <h2>Schedule</h2>

   <form id="addTime">
      <label>Add row:&nbsp;</label>
      <input style="width: 6em" type="text" class="picker" value="12:00"/>
   </form>

   <table id="schedule">
      <tbody>
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
                  <td class="droppable">
                     <span class="set fancyShow type<?php echo $this->_tpl_vars['show']['type']; ?>
"
                      data-id="<?php echo $this->_tpl_vars['show']['showid']; ?>
">
                        <?php echo $this->_tpl_vars['show']['name']; ?>

                     </span>
                  </td>
               <?php endforeach; endif; unset($_from); ?>
               <td class="time"><?php echo $this->_tpl_vars['time']; ?>
</td>
               <td class="delLink"><a class="del">&nbsp;[x]</a></td>
            </tr>
         <?php endforeach; endif; unset($_from); ?>
      </tbody>
   </table>
   <table class="hidden" id="htmltable"></table>
</div>

<div class="clearer">