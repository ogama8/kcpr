<div class="sidebar">
   <h3>Top Ten {$date|date_format:"%m/%d/%Y"}</h3>

   <ol>
   {foreach from=$topten item=chart}
      <li>{$chart->artist} {*{if $chart->album != null}({$chart->album}){/if}*}</li>
   {/foreach}
   </ol>
</div>
