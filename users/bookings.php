<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href = '" . APPURL . "';</script>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SESSION['id'] != $id) {
        echo "<script>window.location.href = '" . APPURL . "';</script>";
    }
    $bookings = $connect->query("SELECT * FROM bookings WHERE user_id='$id'");
    $bookings->execute();

    $AllBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
} else {
    echo "<script>window.location.href = '" . APPURL . "/404.php';</script>";
}


?>





<div class="container">
    <?php if (count($AllBookings) > 0) : ?>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Email</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($AllBookings as $booking) : ?>
                    <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?php echo $booking->email; ?></td>
                        <td><?php echo $booking->full_name; ?></td>
                        <td><?php echo $booking->phone_number; ?></td>
                        <td><?php echo $booking->check_in; ?></td>
                        <td><?php echo $booking->check_out; ?></td>
                        <td><?php echo $booking->hotel_name; ?></td>
                        <td><?php echo $booking->room_name; ?></td>
                        <td><?php echo $booking->status; ?></td>
                        <td><?php echo $booking->payment; ?></td>
                        <td><?php echo $booking->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-dark" role="alert">
            You Have Not Made Booking Just Yet
        </div>
    <?php endif; ?>
</div>
<?php require "../includes/footer.php"; ?>