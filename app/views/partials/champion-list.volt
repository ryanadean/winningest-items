<h2>Choose Champion:</h2>
<table class="champion-index">
    {% set n = 1 %}
    <tr>
    {% for champion in champions %}
        <td valign="top">
            <div class="champion-name">
                {{ link_to('champion/' ~ champion.name ~ '/' , '<img src="' ~ champion.url ~ '" alt=' ~ champion.name ~'"/>"')}}
            </div>
            <div class="champion-name">
                {{ link_to('champion/' ~ champion.name ~ '/' , champion.name)}}
            </div>
        </td>
        {% if (n % 6) == 0 %}
            </tr><tr>
        {% endif %}
        {% set n = n+1 %}
    {% endfor %}
</table>
