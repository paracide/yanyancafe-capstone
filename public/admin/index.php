<?php

global$logger;
require __DIR__ . '/../../config/config.php';

$last10 = $logger->getLast10();

?><!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yanyan Cafe Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css"
          rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-gray-100">
    <header class="navbar bg-gray-800">
      <h1 class="text-2xl font-bold text-white"">Dashboard</h1>
    </header>

    <main class="flex">
      <!--side-->
      <div class="w-40">
        <ul class="mt-4">
          <li class="px-4 py-2 hover:bg-gray-300"><a href="#">Dashboard</a>
          </li>
          <li class="px-4 py-2 hover:bg-gray-300"><a href="#">Logs</a></li>
          </li>
        </ul>
      </div>
      <!--content-->
      <div class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-4">Logs</h2>
        <div class="overflow-x-auto">
          <table class="table ">
            <thead>
              <tr>
                <th>Date</th>
                <th>Event</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($last10 as $item): ?>
                  <tr class="bg-gray-100">
                    <td><?= $item['created_at'] ?></td>
                    <td><?= $item['event'] ?></td>
                  </tr>
                <?php
                endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
