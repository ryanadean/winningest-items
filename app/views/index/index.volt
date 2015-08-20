<h1>Winningest Item Sets!</h1>
<h2>Choose Champion:</h2>

<div class="grid-container outline" >
    {% set n = 1 %}
    {% for champion in champions %}
        {% if n == 1 %}
            <div class="row">
        {% endif %}
        <div class="col-1">
            {{ link_to('../champion/page/' ~ champion , '<img src=/imgs/champions/' ~ champion ~ '.png alt=' ~ champion ~' width="90%" height="50%"/>')}}
            <br>
            {{ link_to('../champion/page/' ~ champion , '<p>' ~ champion ~ '</p>' )}}
        </div>
        {% set n = n+1 %}
        {% if n == 11 %}
            </div>
            {% set n = 1 %}
        {% endif %}
    {% endfor %}
</div>
