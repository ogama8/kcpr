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

   {foreach from=$schedule key="time" item="days"}
      <tr data-time="{$time}" class="time time{$time}">
         <td class="time">{$time|strtotime|date_format:"%l:%M%p"}</td>
         {foreach from=$days key="day" item="spot"}
            <td class="show type{$spot->show->type}"
             data-id="{$spot->show->id}"
             rowspan="{$spot->blocks}">
               {$spot->show->name}
            </td>
         {/foreach}
         <td class="time">{$time|strtotime|date_format:"%l:%M%p"}</td>
      </tr>
   {/foreach}

</table>
