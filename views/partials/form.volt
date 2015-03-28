<div class="new-field" id="field-{{ count }}">
  <hr>
  <div class="form-group">
    <label>Field Name</label>
    <input required class="form-control" type="text" name="fields[{{ count }}][text]" value="" placeholder="Field Name">
  </div>
  <label>Field Data Type</label>
  <select class="form-control" name="fields[{{ count }}][dbtype]">
    <option value="VARCHAR">VARCHAR</option>
    <option value="TEXT">TEXT</option>
    <option value="CHAR">CHAR</option>
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
    <option value="textarea">Textarea</option>
    <option value="dropdown">Dropdown</option>
    <option value="multiselect">Multiselect</option>
    <option value="checkbox">Checkbox</option>
    <option value="radio">Radio</option>
  </select>
  <div class="form-group">
    <label>Constraint <small>Empty or 0 is no constraint</small></label>
    <input class="form-control" type="number" name="fields[{{ count }}][constraint]" value="0">
  </div>
  <div class="form-group">
    <label>Default <small>Empty is no default</small></label>
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
  <p><a href="https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#rulereference" target="_blank" title="CodeIgniter Rule Reference">View Rule Information</a></p>
  <div class="form-group">
    {% set rules = ['required', 'alpha', 'alpha_dash', 'alpha_numeric', 'decimal', 'encode_php_tags', 'integer', 'is_natural', 'is_natural_no_zero', 'xss_clean'] %}
    {% set rules2 = ['trim', 'numeric', 'prep_for_form', 'prep_url', 'strip_image_tags', 'valid_base64', 'valid_email', 'valid_emails', 'valid_ip'] %}
    <div class="col-md-6">
      {% for index, rule in rules %}
        <div class="checkbox">
          <label>
            <input type="checkbox" name="fields[{{ count }}][validation][]" value="{{ rule }}">{{ rule }}
          </label>
        </div>
      {% endfor %}
    </div>
    <div class="col-md-6">
      {% for index, rule in rules2 %}
        <div class="checkbox">
          <label>
            <input type="checkbox" name="fields[{{ count }}][validation][]" value="{{ rule }}">{{ rule }}
          </label>
        </div>
      {% endfor %}
    </div>
  </div>
</div>
<div class="clearfix"></div>