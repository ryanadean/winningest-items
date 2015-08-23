<br>
<div class="main-header"><a href="/">Winningest Item/Skill Sets!</a></div>
<br>
<div class="tip-header"><img src=/imgs/champions/{{champion}}.png alt={{champion}}/>&nbsp;&nbsp;{{champion}}</div>
<br>
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
        {{ form("../set/get/", "method": "get", "id": "form") }} 
        <tr>
             <td>
                 <?php echo $this->tag->selectStatic(array("item_set",$option_list)); ?>
             </td>
             <td>
                 <img src="/imgs/plus.png" width=30px height=30px alt="" />
             </td>
             <td>
                 <?php echo $this->tag->selectStatic(array("skill_set",$option_list)); ?>
             </td> 
             <td width="50">
                 <img src="/imgs/arrow.png" width=30px height=30px alt="" />
             </td>
             <td width="200">
                 {{ submit_button("Create!", "id": "submit") }} 
                 <div id="loading" style="display:none;"><img src="/imgs/loading.gif" alt="" /></div>
             </td>
        </tr>
        {{ endForm()}}
    </tbody>

</table>
<br>
<table class="table-width">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th>Combined Set Option ({{champion}} vs *)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {{ form("../set/get/", "method": "get", "id": "form_combined") }} 
        <tr>
             <td></td>
             <td></td>
             <td>
                 <?php echo $this->tag->selectStatic(array("combined_set",$option_list)); ?>
             </td> 
             <td width="50">
                 <img src="/imgs/arrow.png" width=30px height=30px alt="" />
             </td>
             <td width="200">
                 {{ submit_button("Create!", "id": "submit_combined") }} 
                 <div id="loading_combined" style="display:none;"><img src="/imgs/loading.gif" alt="" /></div>
             </td>
        </tr>
        {{ endForm()}}
    </tbody>
</table>

<br><br>

<table class="table-width" id="download_set" style="visibility: hidden;">
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td>
                <textarea rows="10" cols="50" onclick="this.focus();this.select()" readonly="readonly">
example text
                </textarea>
            </td>
            <td width="200">
                <input type="button" value="Download!" /> 
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
    d.getElementById('download_set').style.visibility= 'visible';
  };

  d.getElementById('form_combined').onsubmit = function () {
    d.getElementById('submit_combined').style.display = 'none';
    d.getElementById('loading_combined').style.display = 'block';
    d.getElementById('download_set').style.visibility= 'visible';
  };

}
(document));
</script>
