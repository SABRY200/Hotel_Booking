<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
$bookings = $connect->query("SELECT * FROM bookings");
$bookings->execute();
$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Bookings</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">CheckIn</th>
              <th scope="col">CheckOut</th>
              <th scope="col">Email</th>
              <th scope="col">PhoneNumber</th>
              <th scope="col">FullName</th>
              <th scope="col">HotelName</th>
              <th scope="col">RoomName</th>
              <th scope="col">Status</th>
              <th scope="col">Payment</th>
              <th scope="col">CreatedAt</th>
              <th scope="col">Status</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($allBookings as $booking) : ?>
              <tr>
                <th scope="row"><?php echo $booking->id; ?></th>
                <td><?php echo $booking->check_in; ?></td>
                <td><?php echo $booking->check_out; ?></td>
                <td><?php echo $booking->email; ?></td>
                <td><?php echo $booking->phone_number; ?></td>
                <td><?php echo $booking->full_name; ?></td>
                <td><?php echo $booking->hotel_name; ?></td>
                <td><?php echo $booking->room_name; ?></td>
                <td><?php echo $booking->status; ?></td>
                <td><?php echo $booking->payment; ?>$</td>
                <td><?php echo $booking->created_at; ?></td>
                <td><a href="status-bookings.php?id=<?php echo $booking->id; ?>" class="btn btn-warning text-white text-center ">Status</a></td>
                <td><a href="delete-bookings.php?id=<?php echo $booking->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>