{% extends "layouts/main.volt" -%}

{% block content %}
<pre>{{ dump(data['fields']) }}</pre>
{% endblock %}