<?php 
require "../../config/config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $getroomimage = $connect->query("SELECT * FROM rooms WHERE id ='$id'");
        $getroomimage->execute();
        $fetch = $getroomimage->fetch(PDO::FETCH_OBJ);

        unlink("room-images/" . $fetch->image );

        $delete_room = $connect->query("DELETE FROM rooms WHERE id = '$id'");
        $delete_room->execute();
        header("location: show-rooms.php");
    }

?>