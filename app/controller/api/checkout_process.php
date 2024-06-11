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
$validator->checkRequired($require, $_POST);
$validator->checkNum($_POST['no'], 'no');
$validator->checkNum($_POST['cvv'], 'cvv');
$error = $validator->getError();
if (count($error)) {
    $_SESSION['errors'] = $error;
    $_SESSION['post']   = $_POST;
    FlashUtils::error("Failed to pay");
    Router::fail(Router::checkout);
}

$orderId = $orderRepo->newOrder($_SESSION[Constant::SESSION_CART]);

