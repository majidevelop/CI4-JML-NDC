<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered locations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-view {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-view:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Registered locations</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td><?= esc($location['ID']) ?></td>
                    <td><?= esc($location['LocationName']) ?></td>
                    <!-- <td>
                        <a href="<?= base_url('location/' . $location['ID']) ?>" class="btn-view">View</a>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
