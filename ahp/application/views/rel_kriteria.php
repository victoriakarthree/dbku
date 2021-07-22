<?php
$data = array();
foreach($rows as $row){    
    $data[$row->ID1][$row->ID2] = $row->nilai;
}
?>
<?=print_error()?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline" method="post">
            <div class="form-group">
                <select class="form-control" name="ID1">
                <?=get_kriteria_option(set_value('ID1'))?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="nilai">
                <?=get_nilai_option(set_value('nilai'))?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="ID2">
                <?=get_kriteria_option(set_value('ID2'))?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </div>
        </form>
    </div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>Kode</th>
        <?php 
        foreach($data as $key=>$value){
            echo "<th>$key</th>";
        }         
        ?>
    </tr>
</thead>
<tbody>
<?php foreach($data as $key => $val):?>
<tr>
    <th><?=$key?></th>
    <?php foreach($val as $k => $v):?>
        <td><?=round($v, 3)?></td>               
    <?php endforeach ?>
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>