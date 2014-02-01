<?php /* Smarty version 2.6.26, created on 2011-05-04 16:54:02
         compiled from admin/simple_charts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'URI', 'admin/simple_charts.tpl', 40, false),)), $this); ?>
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
<?php if (isset ( $this->_tpl_vars['chartURL'] )): ?>
   <div class="error">
      Woah! Charts/Adds already exist for that date. 
      Check them out <a href="<?php echo $this->_tpl_vars['overwriting']; ?>
">here</a>.
      Click submit again to overwrite.
   </div>
<?php endif; ?>

<form name="newCA" method="post" 
 action="<?php echo smarty_function_URI(array('adminPage' => 'submit_charts'), $this);?>
">

<label>date:</label>
<input type="text" class="picker" name="date"
 value="<?php if (isset ( $this->_tpl_vars['date'] )): ?><?php echo $this->_tpl_vars['date']; ?>
<?php else: ?><?php echo time(); ?>
<?php endif; ?>" />
<br />

<textarea cols='90' rows='35' 
 name='charts'><?php if (isset ( $this->_tpl_vars['charts'] )): ?><?php echo $this->_tpl_vars['charts']; ?>
<?php endif; ?> </textarea>

<?php if (isset ( $this->_tpl_vars['overwrite'] )): ?>
   <input type="hidden" name="overwrite" />
<?php endif; ?>

<input type="submit" value="Submit" />

</form>
</div>