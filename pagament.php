<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('/var/www/html/Exercici18-PassarelaPagament/stripe-php-7.14.2/init.php');

include("conexion.php");
if (isset($_GET['id_llibre'])) {
    $id_llibre = $_GET['id_llibre'];
    echo $id_llibre;
}
/*
    // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_kB1fHcLX5BT3yhtauQFaHorF00J2iKVi6c');


$intent = \Stripe\PaymentIntent::create([
    'amount' => 1099,
    'currency' => 'eur',
]);


$intent = \Stripe\PaymentIntent::create([
    'amount' => 1099,
    "currency" => "eur",
    "description" => "Charge for jenny.rosen@example.com"
  ]);

echo json_encode(array('client_secret' => $intent->client_secret));
*/
?>
