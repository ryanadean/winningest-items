<br>
<div class="main-header"><a href="/winningest-items">Winningest Item Sets!</a></div>
<!--<div class="main-header"><a href="/winningest-items">Winningest Item/Skill Sets!</a></div>-->
<br>
<div class="tip-header"><a href="/winningest-items/champion/page/{{champion}}"><img src=/winningest-items/public/imgs/champions/{{champion}}.png alt={{champion}}/></a>&nbsp;&nbsp;{{champion}}</div>
<br>
<!--
<br>

<table class="table-width">
    <thead>
        <tr>
            <th>Item Set Option ({{champion}} vs *)</th>
            <th></th>
            <th>Skill Set Option ({{champion}} vs *)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {{ form("/champion/get/" ~ champion , "method": "post", "id": "form") }} 
        <tr>
             <td>
                 <?php echo $this->tag->selectStatic(array("item_set",$option_list)); ?>
             </td>
             <td>
                 <img src="/winningest-items/public/imgs/plus.png" width=30px height=30px alt="" />
             </td>
             <td>
                 <?php echo $this->tag->selectStatic(array("skill_set",$option_list)); ?>
             </td> 
             <td width="50">
                 <img src="/winningest-items/public/imgs/arrow.png" width=30px height=30px alt="" />
             </td>
             <td width="200">
                 {{ submit_button("Create!", "id": "submit") }} 
                 <div id="loading" style="display:none;"><img src="/winningest-items/public/imgs/loading.gif" alt="" /></div>
             </td>
        </tr>
        {{ endForm()}}
    </tbody>

</table>
-->

<br>
<table class="table-width">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <!--<th>Combined Set Option ({{champion}} vs *)</th>-->
            <th>Item Set Option ({{champion}} vs *)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {{ form("/champion/get/" ~ champion, "method": "post", "id": "form_combined") }} 
        <tr>
             <td></td>
             <td></td>
             <td>
                 <?php echo $this->tag->selectStatic(array("combined_set",$option_list)); ?>
             </td> 
             <td width="50">
                 <img src="/winningest-items/public/imgs/arrow.png" width=30px height=30px alt="" />
             </td>
             <td width="200">
                 {{ submit_button("Create!", "id": "submit_combined") }} 
                 <div id="loading_combined" style="display:none;"><img src="/winningest-items/public/imgs/loading.gif" alt="" /></div>
             </td>
        </tr>
        {{ endForm()}}
    </tbody>
</table>

<hr>

<table class="table-width">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th>Download or copy/paste .json file to <br><font color="gray">"Riot Games\League of Legends\Config\Champions\{champion}\Recommended\"</font></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td>
                <textarea rows="10" cols="50" onclick="this.focus();this.select()" readonly="readonly">
{{json_content}}
                </textarea>
            </td>
            <td width="200">
                <a href="{{filename}}" download><button type="button">Download!</button></a>
                <form action = "/champion/download/" method = "post">
                    <input type = "hidden" value = "{{json_content}}">
                    <button name = "download_button" type = "submit" value = "{{filename}}">Download!</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<!-- Replaces submit button with loading gif -->
<!-- Shows copy/paste textbox and download button -->
<script type="text/javascript">
(function (d) {
  d.getElementById('form').onsubmit = function () {
    d.getElementById('submit').style.display = 'none';
    d.getElementById('loading').style.display = 'block';
  };

  d.getElementById('form_combined').onsubmit = function () {
    d.getElementById('submit_combined').style.display = 'none';
    d.getElementById('loading_combined').style.display = 'block';
  };

}
(document));
</script>

<!-- If back button was used to get to this page, replace loading gif with button -->
<script type="text/javascript">
    onbeforeunload=function(){
        d.getElementById('submit').style.display = 'block';
        d.getElementById('loading').style.display = 'none';
    }
</script>
