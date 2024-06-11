<?php

global $orderRepo;
use App\constant\Constant;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;
use App\tools\Validator;

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

$orderId = $orderRepo->newOrder($_SESSION[Constant::SESSION_CART], $cardNo);
if ($orderId) {
    Router::success(Router::invoice, "&order_id=$orderId");
} else {
    checkOutFailed($error);
}

/**
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
