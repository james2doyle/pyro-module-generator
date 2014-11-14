{% extends "layouts/main.volt" -%}

{% block content %}
	<h1>Error Building Module</h1>
	<p><em>The module was <strong>not</strong> built successfully</em></p>
	<p>{{ link_to('', 'Go back to Home', 'class': 'btn btn-large') }}</p>
{% endblock %}