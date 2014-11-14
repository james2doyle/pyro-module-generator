{% extends "layouts/main.volt" -%}

{% block content %}
	<h1>Module Complete</h1>
	<p><em>The module was built successfully!</em></p>
  <p>{{ link_to('generated/' ~ zipfile, 'download your zip file', 'title': 'download your zip file', 'target': '_blank', 'class': 'btn btn-primary btn-large') }} {{ link_to('', 'Go back to Home', 'class': 'btn btn-default btn-large') }}</p>
  <h4>Like this module? Check out <a href="http://warpaintmedia.ca" target="_blank" title="WARPAINT Media">WARPAINT Media</a>.</h4>
{% endblock %}