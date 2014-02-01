{include file="chartstabs.tpl"}

<div class="chartsAndAdds">
<div class="charts">
<h2>Charts for {"m.d.y"|date:$date}</h2>
   <table class="chartsTable">
      <tr>
         <th>SPOT</th>
         <th>ARTIST</th>
         {if $showAlbum}
            <th>ALBUM</th>
         {/if}
         <th>LABEL</th>
      </tr>
      {foreach from=$charts key="num" item="chart"}
         <tr class="{cycle values="rowOdd, rowEven"}">
            <td>
               {if $chart->rank < 10}
                  &nbsp;
               {/if}
               {$chart->rank}.
            </td>
            <td>
               {$chart->artist}
            </td>
            {if $showAlbum}
               <td>
                  {$chart->album}
               </td>
            {/if}
            <td>
               {$chart->label}
            </td>
         </tr>
      {/foreach}
   </table>
</div>

<div class="adds">
   <h2>Adds</h2>
   <table class="chartsTable">
      <tr>
         <th>ARTIST</th>
         {if $showAlbum}
            <th>ALBUM</th>
         {/if}
         <th>LABEL</th>
      </tr>
      {foreach from=$adds key="num" item="chart"}
         <tr class="{cycle values="rowOdd, rowEven"}">
            <td>
               {$chart->artist}
            </td>
            {if $showAlbum}
               <td>
                  {$chart->album}
               </td>
            {/if}
            <td>
               {$chart->label}
            </td>
         </tr>
      {/foreach}
   </table>
</div>
</div>
