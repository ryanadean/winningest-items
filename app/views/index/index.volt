<br>
<div class="main-header"><a href="/winningest-items">Winningest Item/Skill Sets!</a></div>
<div class="tip-header">(Use your browser's find function + Esc + Enter to quickly select)</div>
<br>
<div class="grid-container" >
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
        {% if n == 14 %}
            </div>
            {% set n = 1 %}
        {% endif %}
    {% endfor %}
</div>

<br><br><br>
<div align="center">Last Updated: </div>
<br><br><br>
