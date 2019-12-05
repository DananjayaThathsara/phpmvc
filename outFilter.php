<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<?php
$me_id= $_REQUEST['me_id'];
?>
<div class="form-group">
    <lable>Outlets <span>*</span></lable>
    <select class="form-control" name="out_id" id="outlet">
        <option disabled selected>Select Outlet</option>
        <?php
        $querymer = "SELECT c.c_name,o.out_city,o.out_id FROM outlets o LEFT JOIN sl_city c ON o.out_city=c.c_id WHERE o.out_status='active' AND o.me_id='".$me_id."'";
        $resultmer = $myCon->query($querymer);
        while ($rowmer = mysqli_fetch_assoc($resultmer)) {
            ?>
            <option value="<?php echo $rowmer['out_id'] ?>"><?php echo $rowmer['c_name'] ?></option>
        <?php } ?>
    </select>
</div>
