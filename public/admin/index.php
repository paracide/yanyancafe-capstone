<?php
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
    <main class="flex h-screen bg-gray-200">

      <div class="w-64 bg-gray-800 text-white">
        <div class="p-4">
          <h1 class="text-2xl font-bold">Admin Dashboard</h1>
        </div>
        <ul class="mt-4">
          <li class="px-4 py-2 hover:bg-gray-700"><a href="#">Dashboard</a>
          </li>
          <li class="px-4 py-2 hover:bg-gray-700"><a href="#">Logs</a></li>
          <li class="px-4 py-2 hover:bg-gray-700"><a href="#">Settings</a>
          </li>
        </ul>
      </div>

      <div class="flex-1 p-6">
        <h2 class="text-2xl font-semibold mb-4">Logs</h2>
        <div class="overflow-x-auto">
          <table class="table w-full">
            <thead>
              <tr>
                <th>Date</th>
                <th>Event</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-gray-100">
                <td>2024-06-05</td>
                <td>abc</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>


  </body>
</html>
