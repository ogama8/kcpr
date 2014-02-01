<h5>KCPR Top Plays for the last week ({$week|date_format:"%m/%d/%Y"})</h5>
<ol>
{foreach from=$charts item=chart}
   <li>{$chart.artist} {if $chart.label != null}({$chart.label}){/if}</li>
{/foreach}
</ol>
