<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Details with QR Code</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        .inventory-details {
            margin-top: 20px;
        }
        .qr-code {
            padding: 20px;
            text-align: center;
        }
        .qr-code img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center my-4">Inventory Details</h1>

    <div class="row inventory-details">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>Category:</th>
                    <td><?= $inventory->category_name; ?></td>
                </tr>
                <tr>
                    <th>Brand:</th>
                    <td><?= $inventory->brand_name; ?></td>
                </tr>
                <tr>
                    <th>Product:</th>
                    <td><?= $inventory->product_name; ?></td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td><?= $inventory->location_name; ?></td>
                </tr>
                <tr>
                    <th>Date Checked In:</th>
                    <td><?= $inventory->today_date; ?></td>
                </tr>
                <tr>
                    <th>Date of Expiry:</th>
                    <td><?= $inventory->date_of_expiry; ?></td>
                </tr>
                <tr>
                    <th>Quantity:</th>
                    <td><?= $inventory->quantity; ?></td>
                </tr>
                <tr>
                    <th>Lot No:</th>
                    <td><?= $inventory->lot_number; ?></td>
                </tr>
                <tr>
                    <th>Cost:</th>
                    <td>$<?= $inventory->cost; ?></td>
                </tr>
            </table>
        </div>

        <div class="col-md-2 qr-code">
            <h4>Image</h4>
            <img style="background-color: black;" src="<?= $inventory->image; ?>" height="200" width="200" alt="QR Code">
        </div>

        <div class="col-md-2 qr-code">
            <h4>QR Code</h4>
            <img src="<?= $inventory->qr_image; ?>" alt="QR Code">
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
