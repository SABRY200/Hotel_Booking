<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
$rooms = $connect->query("SELECT * FROM rooms");
$rooms->execute();
$allRooms = $rooms->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Rooms</h5>
        <a href="create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Price</th>
              <th scope="col">Persons</th>
              <th scope="col">Size</th>
              <th scope="col">View</th>
              <th scope="col">Beds</th>
              <th scope="col">Hotel Name</th>
              <th scope="col">Status Value</th>
              <th scope="col">Change Status</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($allRooms as $room) : ?>
              <tr>
                <th scope="row"><?php echo $room->id; ?></th>
                <td><?php echo $room->name; ?></td>
                <td><?php echo $room->image; ?></td>
                <td><?php echo $room->price; ?>$</td>
                <td><?php echo $room->num_persons; ?></td>
                <td><?php echo $room->size; ?></td>
                <td><?php echo $room->view; ?></td>
                <td><?php echo $room->num_beds; ?></td>
                <td><?php echo $room->hotel_name; ?></td>
                <td><?php echo $room->status; ?></td>
                <td><a href="status-rooms.php?id=<?php echo $room->id; ?>" class="btn btn-danger  text-center ">status</a></td>
                <td><a href="delete-rooms.php?id=<?php echo $room->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>