<?php /* Smarty version 2.6.26, created on 2010-09-12 02:43:43
         compiled from admin/simple_charts.tpl */ ?>
<div style="float: left; width: 600px; margin-right: 30px">
<h4>Add charts and adds simply</h4>
<p>Pick a date, and then list the bands in the text box.<br />
Optionally, the album can be in brackets, and then the label can go in parenthesis (in that order though!).</p>
<p>Example: <br />
<span style='font-family: Courier'>
Charts <br />
1.&nbsp The Avalanches [Since I Left You] (XL Recordings) <br />
2.&nbsp They Might Be Giants [Apollo 18]<br />
3.&nbsp J-Dilla (Stones Throw Records)<br />
<br />
Adds <br />
Ear Pwr [Super Animal Brothers III] (Carpark Records)<br />
Unicorn Basement <br />
Starfucker <br /> </span></p>

<p>The only important formatting is that there must be
a line that says 'adds' (cases don't matter) between the charts and adds. </p>

<p>So don't worry about gaps, lines starting with * or numbers, or the
line that says 'Charts'. It works with or without those. </p>
</div>

<div>
<?php if (isset ( $this->_tpl_vars['chartURL'] )): ?>
   <div class="error">
      Woah! Charts/Adds already exist for that date. 
      Check them out <a href="<?php echo $this->_tpl_vars['overwriting']; ?>
">here</a>.
      Click submit again to overwrite.
   </div>
<?php endif; ?>

<form name="newCA" method="post">

<label>date:</label>
<input type="text" class="picker" name="date"
 value="<?php if (isset ( $this->_tpl_vars['date'] )): ?><?php echo $this->_tpl_vars['date']; ?>
<?php else: ?><?php echo time(); ?>
<?php endif; ?>" />
<br />

<textarea cols='90' rows='35' 
 name='charts'><?php if (isset ( $this->_tpl_vars['charts'] )): ?><?php echo $this->_tpl_vars['charts']; ?>
<?php endif; ?></textarea>

<?php if (isset ( $this->_tpl_vars['overwrite'] )): ?>
   <input type="text" name="overwrite" style="display: none" />
<?php endif; ?>

<input type="submit" value="Submit" />

</form>
</div>
