<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    // Include configuration file  
    require_once 'dataStripe.php';

    // Include Stripe PHP library 
    require_once('/var/www/html/Exercici18-PassarelaPagament/stripe-php-7.14.2/init.php');

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
    $token = $_POST['stripeToken'];
    $titol = $_POST['titolLlibre'];
    $nomUsuari = $_SESSION['nomSessio'];
    
    // Create a Customer
    $customer = \Stripe\Customer::create(array(
        "email" => "sromerom@esliceu.net",
        "source" => $token,
    ));
    // Save the customer id in your own database!
    // Charge the Customer instead of the card
    $charge = \Stripe\Charge::create(array(
        'amount' => $itemPrice,
        'currency' => $currency,
        'description' => $titol,
        'customer' => $customer->id
    ));
?>