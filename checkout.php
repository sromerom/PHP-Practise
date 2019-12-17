<?php
if (isset($_GET['id_llibre'])) {
    $id_llibre = $_GET['id_llibre'];
    echo $id_llibre;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <?php echo '<form action="pagament.php?id_llibre=' . $id_llibre . ?>
    <form action="pagament.php">
        <div id="card-element">
            <input type="text">
            <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="card-errors" role="alert"></div>

        <button id="submit">Pay</button>
    </form>
    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        var stripe = Stripe('pk_test_5gFITSBbGBDTMXHxufwXYkcl00O3OFsPRj');
        var elements = stripe.elements();

        // Set up Stripe.js and Elements to use in checkout form
        var style = {
            base: {
                color: "#32325d",
            }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");

        card.addEventListener('change', ({ error }) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var submitButton = document.getElementById('submit');

        submitButton.addEventListener('click', function (ev) {
            var response = fetch('http://www115.cfgs.esliceu.net/Exercici18-PassarelaPagament/pagament.php').then(function (response) {
                return response.json();
            }).then(function (responseJson) {
                var clientSecret = responseJson.client_secret;
                console.log(clientSecret)
                stripe.confirmCardPayment(clientSecret, {
                    payment_method: { card: card }
                }).then(function (result) {
                    if (result.error) {
                        // Show error to your customer (e.g., insufficient funds)
                        console.log(result.error.message);
                    } else {
                        // The payment has been processed!
                        if (result.paymentIntent.status === 'succeeded') {
                            document.querySelector("body").innerHTML = "The payment has been processed!";
                            // Show a success message to your customer
                            // There's a risk of the customer closing the window before callback
                            // execution. Set up a webhook or plugin to listen for the
                            // payment_intent.succeeded event that handles any business critical
                            // post-payment actions.
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>