{% extends "layouts/main.volt" -%}

{% block content %}
<header class="jumbotron">
	<h1>PyroCMS Module Generator</h1>
	<p>Created by <a href="http://warpaintmedia.ca" title="WARPAINT Media" target="_blank">WARPAINT Media</a>.</p>
	<h5>Version 2.0</h5>
	<small>View <a href="https://github.com/james2doyle/pyro-module-generator" title="Pyro Module Generator On Github" target="_blank">Source On Github</a></small>
</header>
<h3>Module Information</h3>
{{ form('submit',
'method': 'post',
'id': 'form',
'role': 'form',
'enctype': 'multipart/form-data') }}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Module Name</label>
			<input class="form-control" type="text" name="generator_name" placeholder="module name" required>
		</div>
		<div class="form-group">
			<label>Author Name</label>
			<input class="form-control" type="text" name="author" placeholder="author name" value="">
		</div>
		<div class="form-group">
			<label>Author Website</label>
			<input class="form-control" type="text" name="website" placeholder="http://" value="">
		</div>
		<div class="form-group">
			<label>Package</label>
			<input class="form-control" type="text" name="package" placeholder="package" value="">
		</div>
		<div class="form-group">
			<label>Subpackage</label>
			<input class="form-control" type="text" name="subpackage" placeholder="subpackage" value="">
		</div>
		<div class="form-group">
			<label>Copyright</label>
			<input class="form-control" type="text" name="copyright" placeholder="copyright" value="MIT">
		</div>
		<div class="form-group">
			<label>Module Description</label>
			<textarea class="form-control" rows="4" name="description" placeholder="module description" required></textarea>
		</div>
		<p>Frontend</p>
		<div class="radio-inline">
			<label>
				<input type="radio" checked="checked" name="frontend" value="true" selected="selected">True
			</label>
		</div>
		<div class="radio-inline">
			<label>
				<input type="radio" name="frontend" value="false">False
			</label>
		</div>
		<p>Backend</p>
		<div class="radio-inline">
			<label>
				<input type="radio" checked="checked" name="backend" value="true" selected="selected">True
			</label>
		</div>
		<div class="radio-inline">
			<label>
				<input type="radio" name="backend" value="false">False
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<h4>Fields <em>- id and order are already included</em></h4>
		<div id="backendFields">
			<div id="fields">
				{# include the main form by itself #}
				{{ partial("partials/form") }}
			</div>
			<button class="btn btn-danger" id="removeField" style="display: none">Remove This Field</button>
			<button class="btn btn-primary" id="addField">Add Another Field</button>
			<button type="submit" name="generate" value="Generate" class="btn btn-success">Generate Module</button>
		</div>
	</div>
</form>

{% endblock %}