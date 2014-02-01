<h2>New Charts</h2>

<div style="float: left; width: 600px; margin-right: 30px">

Pick a date, and then list the bands in the text box.
Optionally, the album can be in brackets, and then the label can go in parenthesis.

<p>
Example: 

<pre>
Charts 
1.&nbsp; The Avalanches [Since I Left You] (XL Recordings) 
2.&nbsp; They Might Be Giants [Apollo 18]
3.&nbsp; J-Dilla (Stones Throw Records)

Adds 
Ear Pwr [Super Animal Brothers III] (Carpark Records)
Unicorn Basement 
Starfucker  </pre>

<p>The only important formatting is that there must be
a line that says 'adds' (cases don't matter) between the charts and adds. </p>

<p>So don't worry about gaps, lines starting with * or numbers, or the
line that says 'Charts'. It works with or without those. </p>

</div>

<div>
{if isset($chartURL)}
   <div class="error">
      Woah! Charts/Adds already exist for that date. 
      Check them out <a href="{$overwriting}">here</a>.
      Click submit again to overwrite.
   </div>
{/if}

<form name="newCA" method="post" 
 action="{URI adminPage="submit_charts"}">

<label>date:</label>
<input type="text" class="picker" name="date"
 value="{if isset($date)}{$date}{else}{$smarty.now|date_format:"%Y/%m/%d"}{/if}" />
<br />

<textarea cols='90' rows='35' 
 name='charts'>{if isset($charts)}{$charts}{/if} </textarea>

{if isset($overwrite)}
   <input type="hidden" name="overwrite" />
{/if}

<input type="submit" value="Submit" />

</form>
</div>
