<h1>Hello</h1>

<h2>Choose Champion:</h2>
<table class="champion-index">
    {% set n = 1 %}
    <tr>
    {% for champion in champions %}
        <td valign="top">
            <div class="champion-name">
                {{ link_to('../champion/page/' ~ champion , '<img src=/imgs/champions/' ~ champion ~ '.png alt=' ~ champion ~'/>')}}
            </div>
            <div class="champion-name">
                {{ link_to('../champion/page/' ~ champion , champion)}}
            </div>
        </td>
        {% if (n % 6) == 0 %}
            </tr><tr>
        {% endif %}
        {% set n = n+1 %}
    {% endfor %}
</table>
