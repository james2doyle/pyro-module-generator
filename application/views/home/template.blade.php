<div class="fields">
  <input class="onehundred" type="text" name="fields[<?php echo $index; ?>][text]" value="" placeholder="Field Name"><br>
  <select class="onehundred" name="fields[<?php echo $index; ?>][dbtype]">
    <option value="VARCHAR">VARCHAR</option>
    <option value="TEXT">TEXT</option>
    <option value="DATE">DATE</option>
    <option value="INT">INT</option>
    <option value="DATETIME">DATETIME</option>
    <option value="TIMESTAMP">TIMESTAMP</option>
    <option value="BLOB">BLOB</option>
    <option value="BOOL">BOOL</option>
  </select>
  <select class="onehundred" name="fields[<?php echo $index; ?>][type]">
    <option value="input">Input</option>
    <option value="dropdown">Dropdown</option>
    <option value="multiselect">Multiselect</option>
    <option value="checkbox">Checkbox</option>
    <option value="radio">Radio</option>
    <option value="textarea">Textarea</option>
  </select>
<div class="one_full">
<label>Constraint</label>
<div class="clearfix"></div>
<input type="text" name="fields[<?php echo $index; ?>][constraint]" value="0">
<div class="clearfix"></div>
<label>Default</label>
<div class="clearfix"></div>
<input type="text" name="fields[<?php echo $index; ?>][default]" value="">
<div class="clearfix"></div>
<label>Null
<select class="onehundred" name="fields[<?php echo $index; ?>][null]">
<option value="false">False</option>
<option value="true">True</option>
</select>
</label>
</div>
  <br>
  <label>Form Validation </label>
  <ul>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="required">&nbsp;&nbsp;required</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="trim">&nbsp;&nbsp;trim</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="valid_email">&nbsp;&nbsp;email</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="alpha">&nbsp;&nbsp;alpha</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="is_unique">&nbsp;&nbsp;is_unique</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="integer">&nbsp;&nbsp;integer</label></li>
    <li><label class="checkbox inline"><input type="checkbox" name="fields[<?php echo $index; ?>][validation][]" value="xss_clean">&nbsp;&nbsp;xss_clean</label></li>
  </ul>
</div>
