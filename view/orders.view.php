<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card mx-8 mt-16">
    <h1 class="font-bold mb-4">Orders List</h1>
    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
          <tr>
            <th>ID</th>
            <th>Price</th>
            <th>GST</th>
            <th>PST</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
          <!-- PHP to loop through orders and create table rows -->
            <?php foreach ($orders as $order): ?>
              <tr>
                <td><?php echo htmlspecialchars($order['id']); ?></td>
                <td><?php echo htmlspecialchars($order['price']); ?></td>
                <td><?php echo htmlspecialchars($order['gst']); ?></td>
                <td><?php echo htmlspecialchars($order['pst']); ?></td>
                <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                <td><?php echo htmlspecialchars($order['status']); ?></td>
                <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                <td><?php echo htmlspecialchars($order['updated_at']); ?></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
