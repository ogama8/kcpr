{include file="chartstabs.tpl"}

<p>
{foreach from=$dates key="yearNum" item="year"}
   <h4 class="yearbanner">Charts for {$yearNum}</h2>
   <div class="archives">
      <table id="archivesTable"> <tr> 
      
      {foreach from=$year key="monthNum" item="month"}
         <td> <ul>
         {foreach from=$month key="num" item="chart"}

            <li><a href="archives/{$chart.year}-{$chart.month}-{$chart.day}">{$chart.unixtime|date_format:"%b %d"}</a></li>
               
         {/foreach}
         </ul> </td> 
      {/foreach}

      </tr> </table> 
   </div>
{/foreach}
</p>
