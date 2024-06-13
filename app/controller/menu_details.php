<?php
namespace App\controller;

global $categoryRepo, $menuRepo;
use App\tools\Router;

$paramId = $_GET['id'] ?? null;
$menu    = $menuRepo->searchById($paramId);

$props = [
  "menu" => $menu,
  'title'       => 'Menu Details',

];

Router::view('menu_details', $props);
