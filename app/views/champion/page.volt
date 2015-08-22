<br>
<div class="main-header"><a href="/">Winningest Item/Skill Sets!</a></div>
<br>
<div class="tip-header"><img src=/imgs/champions/{{champion}}.png alt={{champion}}/>&nbsp;&nbsp;{{champion}}</div>
<br>
<br>

<table class="table-width">
        <thead>
        <tr>
            <th></th>
            <th>Combined Set Option ({{champion}} vs *)</th>
        </tr>
    </thead>
    <tbody>
        <?= $this->tag->form("../set/create") ?> 
        <tr>
             <td></td>
             <td>
                 <?php echo $this->tag->selectStatic(
                     array(
                         "status",
                         $option_list
                     )
                 ); ?>
             </td>
             <td>
                <?= $this->tag->submitButton("Create!") ?>
             </td>
        </tr>
        <?= $this->tag->endForm() ?>
    </tbody>
    <thead>
        <tr>
            <th>Item Set Option ({{champion}} vs *)</th>
            <th>Skill Set Option ({{champion}} vs *)</th>
        </tr>
    </thead>
    <tbody>
        <?= $this->tag->form("../set/create") ?> 
        <tr>
             <td>
                 <?php echo $this->tag->selectStatic(
                     array(
                         "status",
                         $option_list
                     )
                 ); ?>
             </td>
             <td>
                 <?php echo $this->tag->selectStatic(
                     array(
                         "status",
                         $option_list
                     )
                 ); ?>
             </td> 
             <td>
                <?= $this->tag->submitButton("Create!") ?>
             </td>
        </tr>
        <?= $this->tag->endForm() ?>
    </tbody>

</table>
<br>
