<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
$hotels = $connect->query("SELECT * FROM hotels");
$hotels->execute();
$allHotels = $hotels->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST['submit'])) {
  //if input is empty
  if (empty($_POST['name']) or empty($_POST['price']) or empty($_POST['num_persons']) 
      or empty($_POST['num_beds']) or empty($_POST['size']) or empty($_POST['view'])
      or empty($_POST['hotel_name']) or empty($_POST['hotel_id'])) {
    echo "<script>alert('One or More is Empty')</script>";
  } else {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $num_persons = $_POST['num_persons'];
    $num_beds = $_POST['num_beds'];
    $size = $_POST['size'];
    $view = $_POST['view'];
    $hotel_name = $_POST['hotel_name'];
    $hotel_id = $_POST['hotel_id'];
    $image = $_FILES['image']['name'];
    $dir = "room-images/" . basename($image);

    $insert = $connect->prepare("INSERT INTO rooms (name , price, num_persons, num_beds, size, hotel_name, hotel_id, view, image) 
    VALUES (:name , :price, :num_persons, :num_beds, :size, :hotel_name, :hotel_id, :view, :image)");
    $insert->execute([
      ":name" => $name,
      ":price" => $price,
      ":num_persons" => $num_persons,
      ":num_beds" => $num_beds,
      ":size" => $size,
      ":hotel_name" => $hotel_name,
      ":hotel_id" => $hotel_id,
      ":view" => $view,
      ":image" => $image,
    ]);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
      header("location: show-rooms.php");
    }
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
        <form method="POST" action="create-rooms.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control" placeholder="Image"/>
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Price" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="num_persons" id="form2Example1" class="form-control" placeholder="Num Persons" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="num_beds" id="form2Example1" class="form-control" placeholder="Num Beds" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="size" id="form2Example1" class="form-control" placeholder="Size" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="view" id="form2Example1" class="form-control" placeholder="View" />
          </div>
          <select name="hotel_name" class="form-control">
            <option>Choose Hotel Name</option>
            <?php foreach($allHotels as $hotel) : ?>
              <option value="<?php echo $hotel->name; ?>"><?php echo $hotel->name; ?></option>
            <?php endforeach; ?>
          </select>
          <br>
          <select name="hotel_id" class="form-control">
            <option>Choose Same Hotel ID</option>
            <?php foreach($allHotels as $hotel) : ?>
              <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->name; ?></option>
            <?php endforeach; ?>
          </select>
          <br>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>
