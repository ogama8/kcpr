<p>Which charts do you want to edit?</p>
<ul>
{foreach from=$dates item=date}
   <li><a href="{$date.link}">{$date.month}-{$date.day}-{$date.year}</a></li>
{/foreach}
</ul>
