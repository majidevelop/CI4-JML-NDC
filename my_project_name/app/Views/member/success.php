<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            width: 400px;
        }
        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .card h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        .card p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="card">
        <?php if (isset($data['photo'])) : ?>
            <img src="<?= base_url('uploads/' . $data['photo']) ?>" alt="Profile Photo">
        <?php else : ?>
            <img src="<?= base_url('uploads/default.png') ?>" alt="Default Profile Photo">
        <?php endif; ?>
        <h2><?= esc($data['name']) ?></h2>
        <p>Email: <?= esc($data['email']) ?></p>
        <p>Mobile: <?= esc($data['mobile']) ?></p>
        <p>Address: <?= esc($data['address']) ?></p>
        <p>State: <?= esc($data['state']) ?></p>
        <p>District: <?= esc($data['district']) ?></p>
        <p>Pin: <?= esc($data['pin']) ?></p>
        <p>Taluk: <?= esc($data['taluk']) ?></p>
        <p>Panchayath: <?= esc($data['panchayath']) ?></p>
        <p>Aadhar Number: <?= esc($data['aadhar']) ?></p>
    </div>
    <a href="/" class="btn">Go Back to Home</a>
</body>
</html>
