<table class="table">
    <thead>
        <tr>
            <th>Category</th>
            <th>Brand</th>
            <th>Product Type</th>
            <th>Location</th>
            <th>Date Checked In</th>
            <th>Date Of Expiry</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>QR Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($inventory)): ?>
            <?php foreach ($inventory as $item): ?>
                <tr>
                    <td><?= $item->category_name; ?></td>
                    <td><?= $item->brand_name; ?></td>
                    <td><?= $item->product_name; ?></td>
                    <td><?= $item->location_name; ?></td>
                    <td><?= date('Y-m-d', strtotime($item->created_at)); ?></td>
                    <td><?= $item->date_of_expiry; ?></td>
                    <td><?= $item->quantity; ?></td>
                    <td><?= $item->cost; ?></td>
                    <td>
                        <img src="<?= $item->qr_image ?>" width="20" height="20" alt="">
                    </td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">No inventory found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
