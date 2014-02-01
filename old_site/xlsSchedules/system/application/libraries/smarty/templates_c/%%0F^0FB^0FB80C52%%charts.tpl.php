<?php /* Smarty version 2.6.26, created on 2010-09-30 02:35:50
         compiled from charts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date', 'charts.tpl', 5, false),array('function', 'cycle', 'charts.tpl', 16, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "chartstabs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="chartsAndAdds">
<div class="charts">
<h2>Charts for <?php echo ((is_array($_tmp="m.d.y")) ? $this->_run_mod_handler('date', true, $_tmp, $this->_tpl_vars['date']) : date($_tmp, $this->_tpl_vars['date'])); ?>
</h2>
   <table class="charts">
      <tr>
         <th>SPOT</th>
         <th>ARTIST</th>
         <?php if ($this->_tpl_vars['showAlbum']): ?>
            <th>ALBUM</th>
         <?php endif; ?>
         <th>LABEL</th>
      </tr>
      <?php $_from = $this->_tpl_vars['charts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['chart']):
?>
         <tr class="<?php echo smarty_function_cycle(array('values' => "rowOdd, rowEven"), $this);?>
">
            <td>
               <?php if ($this->_tpl_vars['chart']['rank'] < 10): ?>
                  &nbsp;
               <?php endif; ?>
               <?php echo $this->_tpl_vars['chart']['rank']; ?>
.
            </td>
            <td>
               <?php echo $this->_tpl_vars['chart']['artist']; ?>

            </td>
            <?php if ($this->_tpl_vars['showAlbum']): ?>
               <td>
                  <?php echo $this->_tpl_vars['chart']['album']; ?>

               </td>
            <?php endif; ?>
            <td>
               <?php echo $this->_tpl_vars['chart']['label']; ?>

            </td>
         </tr>
      <?php endforeach; endif; unset($_from); ?>
   </table>
</div>

<div class="adds">
   <h2>Adds</h2>
   <table class="charts">
      <tr>
         <th>ARTIST</th>
         <?php if ($this->_tpl_vars['showAlbum']): ?>
            <th>ALBUM</th>
         <?php endif; ?>
         <th>LABEL</th>
      </tr>
      <?php $_from = $this->_tpl_vars['adds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['chart']):
?>
         <tr class="<?php echo smarty_function_cycle(array('values' => "rowOdd, rowEven"), $this);?>
">
            <td>
               <?php echo $this->_tpl_vars['chart']['artist']; ?>

            </td>
            <?php if ($this->_tpl_vars['showAlbum']): ?>
               <td>
                  <?php echo $this->_tpl_vars['chart']['album']; ?>

               </td>
            <?php endif; ?>
            <td>
               <?php echo $this->_tpl_vars['chart']['label']; ?>

            </td>
         </tr>
      <?php endforeach; endif; unset($_from); ?>
   </table>
</div>
</div>