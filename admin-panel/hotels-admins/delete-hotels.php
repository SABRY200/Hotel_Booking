<?php require "../../config/config.php"; ?>
<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $getimage = $connect->query("SELECT * FROM hotels WHERE id ='$id'");
        $getimage->execute();

        $fetch = $getimage->fetch(PDO::FETCH_OBJ);

        unlink("hotel-images/" . $fetch->image );

        $delete_hotel = $connect->query("DELETE FROM hotels WHERE id = '$id'");
        $delete_hotel->execute();

        header("location: show-hotels.php");
    }








?>