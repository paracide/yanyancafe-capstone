<?php

global $ordersRepo;
use App\constant\Constant;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;
use App\tools\Validator;

/**
 * This controller is used to process checkout
 * return to invoice page
 */
Preconditions::checkPostRequest();

//validate the form
$require = [
  "name",
  "no",
  "date",
  "cvv",
];

$validator = new Validator();
$cardNo    = $_POST['no'];
$validator->checkRequired($require, $_POST);
$validator->checkNum($cardNo, 'no');
$validator->checkNum($_POST['cvv'], 'cvv');
$error = $validator->getError();
if (count($error)) {
    checkOutFailed($error);
}

/**
 * Save order, clear cart and redirect to invoice page
 */
$orderId = $ordersRepo->newOrder($_SESSION[Constant::SESSION_CART], $cardNo);
if ($orderId) {
    unset($_SESSION[Constant::SESSION_CART]);
    FlashUtils::success("Order placed successfully, Thank you!");
    Router::success(Router::invoice, "&order_id=$orderId");
} else {
    checkOutFailed($error);
}

/**
 * Redirect to checkout page when checkout failed
 *
 * @param   array  $error
 *
 * @return void
 */
function checkOutFailed(array $error): void
{
    $_SESSION['errors'] = $error;
    FlashUtils::error("Failed to pay");
    Router::fail(Router::checkout);
}
