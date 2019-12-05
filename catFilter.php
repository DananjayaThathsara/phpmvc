
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<?php
$cat = $_REQUEST['cat'];
?>
<div class="form-group">
    <lable>Sub Category <span>*</span></lable>
    <select class="form-control" name="me_sub_cat_id" >
        <option disabled selected></option>
        <?php
        $querysubcat = "SELECT * FROM me_sub_category WHERE me_cat_id='".$cat."' AND me_sub_cat_status='active'";
        $resultsubcat = $myCon->query($querysubcat);
        while ($rowsub = mysqli_fetch_assoc($resultsubcat)) {
            ?>
            <option value="<?php echo $rowsub['me_sub_cat_id'] ?>"><?php echo $rowsub['me_sub_cat_name'] ?></option>
        <?php } ?>
    </select>
</div>
</div>
