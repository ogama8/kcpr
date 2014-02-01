<h2>Schedule</h2>


<form id="scheduleForm" method="post">

 {* The value is midnight in Las Angeles time before epoch. *}
<button type="button" id="timeButton"  
 class="picker" value="0:00">New Time</button>

<button type="button" id="clearButton">Clear Shows</button>
<input type="submit" value="Save Changes" />

<table id="schedule">
   <tr id="days">
      <th class="empty"> </th>
      {foreach from=$days item="day"}
         <th>{$day}</th>
      {/foreach}
      <th class="empty"> </th>
   </tr>
   {foreach from=$schedule key="time" item="days"}
      <tr data-time="{$time}" class="time time{$time}">
         <td class="time">{$time}</td>

         {foreach from=$days key="day" item="schedule"}
            <td>

               <input type="hidden" 
                name="schedule[{$time}][{$day}][id]" 
                value="{$schedule->id}" />

               <select name="schedule[{$time}][{$day}][showid]">
                  <option value=""> </option>
                  {foreach from=$shows item="show"}
                     <option 
                      {if $show->id == $schedule->show_id}
                         selected=selected
                      {/if}
                      value="{$show->id}"
                     >
                        {$show->name}
                     </option>
                  {/foreach}
               </select>

               <input class="deleteFlag" type="hidden" 
                name="schedule[{$time}][{$day}][delete]" value="" />

            </td>
         {/foreach}

         <td class="time">{$time}</td>
         <td class="delLink"><a class="del">&nbsp;[x]</a></td>
      </tr>
   {/foreach}
</table>

</form>

{* Prototype row for JavaScript to copy *}
<table>
   <tr class="time hidden" id="prototype">
      <td class="time"></td>
      {foreach from=$days key="day" item="dayName"}
         <td class="day" data-day="{$day}">

            <input class="idPlaceholder" type="hidden" value="" />

            <select >
               <option value=""> </option>
               {foreach from=$shows item="show"}
                  <option value="{$show->id}">{$show->name}</option>
               {/foreach}
            </select>

            <input type="hidden" class="deleteFlag" value="" />

         </td>
      {/foreach}
      
      <td class="time"></td>
      <td class="delLink"><a class="del">&nbsp;[x]</a></td>
   </tr>
</table>
