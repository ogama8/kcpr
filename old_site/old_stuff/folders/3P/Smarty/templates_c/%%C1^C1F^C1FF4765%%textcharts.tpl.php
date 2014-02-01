<?php /* Smarty version 2.6.26, created on 2010-08-27 12:31:22
         compiled from old/textcharts.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['error'] )): ?>
   <p style="color: red"><?php echo $this->_tpl_vars['error']; ?>
</p>
<?php endif; ?>

<table><tr><td style='vertical-align: top; padding-top: 2em;'>
<p>Pick a date, and then list the bands in the text box. Label goes in parenthesis</p>
<p>Example: <br />
<span style='font-family: Courier'>
Charts <br />
1.&nbsp The Avalanches (XL Recordings)<br />
2.&nbsp They Might Be Giants <br />
3.&nbsp J-Dilla  (Stones Throw Records)<br />
<br />
Adds <br />
Ear Pwr <br />
Unicorn Basement <br />
Starfucker <br /> </span></p>

<p>The only thing that really matters is there must be <br />
a line that says 'Adds/adds/ADDS' between the charts and adds. </p>

<p>So don't worry about gaps, numbering the adds, or the<br />
line that says 'Charts'. It works with or without those. </p>

</td><td>

<form name="newCA" method="post" action="submit.php?overwrite=<?php echo $this->_tpl_vars['overwrite']; ?>
" onSubmit='return checkDate(this)'>
month: <input type="text" name="month" size="2" value="<?php echo $this->_tpl_vars['month']; ?>
">
day: <input type="text" name="day" size="2" value="<?php echo $this->_tpl_vars['day']; ?>
">
year: <input type="text" name="year" size="2" value="<?php echo $this->_tpl_vars['year']; ?>
">
<br />
<textarea cols='60' rows='35' name='data'><?php echo $this->_tpl_vars['data']; ?>
</textarea>
<br />
<input type="submit" value="Submit">
</form>
</td></tr></table>
</body>
</html>