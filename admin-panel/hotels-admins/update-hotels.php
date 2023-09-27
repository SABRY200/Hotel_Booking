<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
if(isset($_GET['id'])){
  $id = $_GET['id'];


  $hotel = $connect->query("SELECT * FROM hotels WHERE id ='$id'");
  $hotel->execute();
  $hotelSingle = $hotel->fetch(PDO::FETCH_OBJ); 

  if (isset($_POST['submit'])) {
    //if input is empty
    if (empty($_POST['name']) or empty($_POST['description']) or empty($_POST['location'])) {
      echo "<script>alert('One or More is Empty')</script>";
    } else {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $location = $_POST['location'];
      $update = $connect->prepare("UPDATE hotels SET name = :name, description = :description, location = :location  WHERE id='$id'");
      $update->execute([
        ":name" => $name,
        ":description" => $description,
        ":location" => $location,
      ]);
      header("location: show-hotels.php");
    }
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
        <form method="POST" action="update-hotels.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" value="<?php echo $hotelSingle->name ; ?>" name="name" id="form2Example1" class="form-control" placeholder="Name" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
              <?php echo $hotelSingle->description ; ?>
            </textarea>
          </div>
          <div class="form-outline mb-4 mt-4">
            <label for="exampleFormControlTextarea1">Location</label>
            <input type="text" value="<?php echo $hotelSingle->location ; ?>" name="location" id="form2Example1" class="form-control" />
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>
