<style>
    .card-search-list{
        cursor: pointer;

    }
    .card-search-list:hover{
        background-color: #3e4854;
        color: #fff;
    }
</style>
<?php

include_once '../models/dbConfig.php';
$myCon=new dbConfig();
$myCon->connect();


if(isset($_POST["query"]))
{
    $output = '';
    $query = "SELECT * FROM cards WHERE gen_card_id LIKE '%".$_POST["query"]."%' AND gen_card_status='INACTIVE'";
    $result = $myCon->query($query);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<li class="card-search-list">'.$row["gen_card_id"].'</li>';
        }
    }
    else
    {
        $output .= '<li>Card Number Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}
?>