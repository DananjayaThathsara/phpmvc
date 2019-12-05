<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<?php
$city = $_REQUEST['city'];
?>
<div class="form-group">
    <lable>Living City</lable>
    <select class="form-control" name="mem_living_city" required>
        <option selected>Select City</option>
        <?php
        $querycity = "SELECT c_id, c_name FROM sl_city WHERE d_id='" . $city . "' ORDER BY c_name ASC";
        $resultcity = $myCon->query($querycity);
        while ($row1 = mysqli_fetch_assoc($resultcity)) {
            ?>
            <option value="<?php echo $row1['c_id']; ?>"><?php echo $row1['c_name']; ?></option>
        <?php } ?>
    </select>

</div>
