<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Include configuration file  
require_once 'dataStripe.php';
include('conexion.php');
if (isset($_GET['id_llibre'])) {
    $id_llibre = $_GET['id_llibre'];
    $consulta = "SELECT * FROM llibres WHERE id_llibre =" . $id_llibre;
    $resCon = mysqli_query($connexio, $consulta);
    if ($resCon) {
        $row = $resCon->fetch_assoc();
        $itemName = $row['titol'];
        $itemNumber = $row['id_llibre'];
        echo $itemName;
        echo $itemNumber;
        //echo $row['uri'];
    }
}

mysqli_close($connexio);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>

<body>
<form action="payment.php" method="POST" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>
<script src="https://js.stripe.com/v3/"></script>
    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
        var elements = stripe.elements();

        // Set up Stripe.js and Elements to use in checkout form
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '24px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var card = elements.create('card', {style: style});
        card.mount("#card-element");

        card.addEventListener('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Send Stripe Token to Server
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            // Add Stripe Token to hidden input
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);

            var hiddenLlibre = document.createElement('input');
            hiddenLlibre.setAttribute('type', 'hidden');
            hiddenLlibre.setAttribute('name', 'titolLlibre');
            hiddenLlibre.setAttribute('value', '<?php echo $itemName; ?>');

            form.appendChild(hiddenInput);
            form.appendChild(hiddenLlibre);
            // Submit form
            form.submit();
        }
    </script>

</body>

</html>