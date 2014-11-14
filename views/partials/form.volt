<hr>
<div class="new-field" id="field-{{ count }}">
  <div class="form-group">
    <label>Field Name</label>
    <input required class="form-control" type="text" name="fields[{{ count }}][text]" value="" placeholder="Field Name">
  </div>
  <label>Field Data Type</label>
  <select class="form-control" name="fields[{{ count }}][dbtype]">
    <option value="VARCHAR">VARCHAR</option>
    <option value="TEXT">TEXT</option>
    <option value="DATE">DATE</option>
    <option value="INT">INT</option>
    <option value="DATETIME">DATETIME</option>
    <option value="TIMESTAMP">TIMESTAMP</option>
    <option value="BLOB">BLOB</option>
    <option value="BOOL">BOOL</option>
  </select>
  <label>Field Input Type</label>
  <select class="form-control" name="fields[{{ count }}][type]">
    <option value="input">Input</option>
    <option value="dropdown">Dropdown</option>
    <option value="multiselect">Multiselect</option>
    <option value="checkbox">Checkbox</option>
    <option value="radio">Radio</option>
    <option value="textarea">Textarea</option>
  </select>
  <div class="form-group">
    <label>Constraint <small>Empty or 0 is no constraint</small></label>
    <input class="form-control" type="number" name="fields[{{ count }}][constraint]" value="0">
  </div>
  <div class="form-group">
    <label>Default <small>Empty or 0 is no default</small></label>
    <input class="form-control" type="text" name="fields[{{ count }}][default]" value="">
  </div>
  <p><label>Is Null</label></p>
  <div class="radio-inline">
    <label>
      <input type="radio" name="fields[{{ count }}][null]" value="false"checked="checked">False
    </label>
  </div>
  <div class="radio-inline">
    <label>
      <input type="radio" name="fields[{{ count }}][null]" value="true">True
    </label>
  </div>
  <br>
  <label>Form Validation</label>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="required">required
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="trim">trim
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="valid_email">email
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="alpha">alpha
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="is_unique">is_unique
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="integer">integer
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="fields[{{ count }}][validation][]" value="xss_clean">xss_clean
      </label>
    </div>
  </div>
</div>