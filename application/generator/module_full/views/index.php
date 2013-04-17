{{ if {module_name_l}s.total > 0 }}
<div id="{module_name_l}">
    <h3>{{ helper:lang line="{module_name_l}:questions" }}</h3>
    {{ pagination:links }}
    <div id="questions">
        <ol>
            {{ {module_name_l}s.entries }}
            <li>{{ url:anchor segments="{module_name_l}/#{{ id }}" title="{{ question }}" class="question" }}</li>
            {{ /{module_name_l}s.entries }}
        </ol>
    </div>
    <div id="answers">
        <h3>{{ helper:lang line="{module_name_l}:answers" }}</h3>
        <ol>
            {{ {module_name_l}s.entries }}
            <li class="answer">
                <h4 id="{{ id }}">{{ question }}</h4>
                <p>{{ answer }}</p>
            </li>
            {{ /{module_name_l}s.entries }}
        </ol>
    </div>
</div>
{{ else }}
<h4>{{ helper:lang line="{module_name_l}:no_{module_name_l}s" }}</h4>
{{ endif }}