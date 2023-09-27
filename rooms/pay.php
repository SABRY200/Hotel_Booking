<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    // header("location: http://localhost/hotel-booking/index.php");
    echo "<script>window.location.href = '".APPURL."';</script>";
    exit;
}


?>
<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL; ?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div style="margin-left: 254px;" class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 ftco-animate">
                <h2 class="subheading" style="font-size: 63px; margin-bottom: 55px;">Pay Page For Your Room</h2>
                <div class="container">
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo $_SESSION['price']; ?>' // Can also reference a variable or function
                                        }
                                    }]
                                });
                            },
                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {
                                return actions.order.capture().then(function(orderData) {

                                    window.location.href = 'index.php';
                                });
                            }
                        }).render('#paypal-button-container');
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['price']; ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    window.location.href = 'index.php';
                });
            }
        }).render('#paypal-button-container');
    </script>

</div>
<?php require "../includes/footer.php"; ?>