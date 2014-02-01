<div style="float: left; width: 500px; margin-right: 40px"> 
{if isset($msg)} {$msg} {/if}

<p>What would you like to do regarding Charts &amp Adds?</p>
<ul>
<li><a href="simple_charts">Create charts/adds manually</a></li>
<li><a href="edit">Edit charts/adds</a></li>
</ul>
</div>
{if isset($charts)}
Here's the new charts for easy copy/pasting:
<textarea cols='90' rows='35' 
 name='charts'>{$charts}</textarea>
{/if}
