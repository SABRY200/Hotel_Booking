<?php require "../../config/config.php"; ?>
<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // $getbookings = $connect->query("SELECT * FROM bookings WHERE id ='$id'");
        // $getbookings->execute();

        // $fetch = $getbookings->fetch(PDO::FETCH_OBJ);

        $delete_bookings = $connect->query("DELETE FROM bookings WHERE id = '$id'");
        $delete_bookings->execute();

        header("location: show-bookings.php");
    }








?>