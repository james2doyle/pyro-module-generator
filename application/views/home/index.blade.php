@include('partials.header')
<div class="boxed">
<header class="center">
<h1>PyroCMS Module Generator</h1>
<h4>Created by <a target="_blank" href="https://twitter.com/james2doyle">James Doyle</a></h4>
<h5>Version 1.1</h5>
</header>
<h3>Module Information</h3>
<?php echo Form::open('makeTemplate', 'POST', array('id'=>'form')); ?>
<fieldset class="one_half">
<input class="onehundred" type="text" name="generator_name" placeholder="module name">
<input class="onehundred" type="text" name="author" placeholder="author name" value="">
<input class="onehundred" type="text" name="website" placeholder="http://" value="">
<input class="onehundred" type="text" name="package" placeholder="package" value="">
<input class="onehundred" type="text" name="subpackage" placeholder="subpackage" value="">
<input class="onehundred" type="text" name="copyright" placeholder="copyright" value="MIT">
<textarea class="onehundred" rows="4" name="description" placeholder="module description"></textarea>
<p>Frontend<br>
<label class="radio inline">
<input type="radio" checked="checked" name="frontend" value="true" selected="selected">True</label>
<label class="radio inline">
<input type="radio" name="frontend" value="false">False</label></p>
<p>Backend<br>
<label class="radio inline">
<input type="radio" checked="checked" name="backend" value="true" selected="selected">True</label>
<label class="radio inline">
<input type="radio" name="backend" value="false">False</label></p>
</fieldset>
<fieldset class="one_half model">
<h4>Fields <em>- id is already included</em></h4>
<div id="backendFields">
<div class="fields">
<input class="onehundred" type="text" name="fields[0][text]" value="" placeholder="Field Name"><br>
<select class="onehundred" name="fields[0][dbtype]">
<option value="VARCHAR">VARCHAR</option>
<option value="TEXT">TEXT</option>
<option value="DATE">DATE</option>
<option value="INT">INT</option>
<option value="DATETIME">DATETIME</option>
<option value="TIMESTAMP">TIMESTAMP</option>
<option value="BLOB">BLOB</option>
<option value="BOOL">BOOL</option>
</select>
<select class="onehundred" name="fields[0][type]">
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
<input type="text" name="fields[0][constraint]" value="0">
<div class="clearfix"></div>
<label>Default</label>
<div class="clearfix"></div>
<input type="text" name="fields[0][default]" value="">
<div class="clearfix"></div>
<label>Null
<select class="onehundred" name="fields[0][null]">
<option value="false">False</option>
<option value="true">True</option>
</select>
</label>
</div>
<br>
<label>Form Validation </label>
<ul>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="required">&nbsp;&nbsp;required</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="trim">&nbsp;&nbsp;trim</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="valid_email">&nbsp;&nbsp;email</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="alpha">&nbsp;&nbsp;alpha</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="is_unique">&nbsp;&nbsp;is_unique</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="integer">&nbsp;&nbsp;integer</label></li>
<li><label class="checkbox inline"><input type="checkbox" name="fields[0][validation][]" value="xss_clean">&nbsp;&nbsp;xss_clean</label></li>
</ul>
</div>
</div>
<br />
<br />
<button class="button blue" id="addField" href="">Add Field</button>
<button type="submit" name="generate" value="Generate" class="button yellow">Generate</button>
</fieldset>
</form>
</div>
@include('partials.footer')
