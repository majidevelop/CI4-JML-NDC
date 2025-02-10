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
        table {
    width: 100%;
    border-collapse: collapse;
}

td:first-child {
    width: 50%;
}

    </style>
</head>
<body>
    <div class="card">
        <div style="display:flex;">

        <div style="width:70%;">
            <h1 style="text-align:left;">
                National <br>
                Democratic <br>
                Corps - NDC
            </h1>
        </div>
        <div style="padding:2rem;">
            <img src="<?= base_url('uploads/logo_try_nehru.png') ?>" alt="Logo">

        </div>
        </div>

        <?php if (isset($data['photo'])) : ?>
            <img src="<?= base_url('uploads/' . $data['photo']) ?>" alt="Profile Photo">
        <?php else : ?>
            <img src="<?= base_url('uploads/default.png') ?>" alt="Default Profile Photo">
        <?php endif; ?>
        <h2><?= esc($data['name']) ?></h2>
        <table style="text-align:left;">
            <tr>
                <td>
                <p>Membership No</p>

                </td>
                <td>:</td>
                <td>
                <p> <?= esc($data['email']) ?></p>

                </td>
            </tr>
            
            <tr>
                <td>
                <p>Email</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['email']) ?></p>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                <p>Mobile</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['mobile']) ?></p>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                <p>Address</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['address']) ?></p>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Blood Group
                </td>
                <td>:</td>
                <td>
                    <?= esc($data['blood_name']) ?>
                </td>
            </tr>
            
            <tr>
                <td>
                <p>State</p>

                </td>
                <td>:</td>

                <td>
        <p> Kerala</p>
                    
                </td>
            </tr>
            
            <!-- <tr>
                <td>
                <p>District</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['district']) ?></p>
                    
                </td>
            </tr> -->
            <tr>
                <td>
                <p>Pin</p>

                </td>
                <td>:</td>

                <td>
                <p> <?= esc($data['pin']) ?></p>

                </td>
            </tr>
            <tr>
                <td>
                <p>Taluk</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['taluk_name']) ?></p>
                    
                </td>
            </tr>
            <!-- <tr>
                <td>
                <p>Panchayath</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['panchayath']) ?></p>
                    
                </td>
            </tr> -->
            <tr>
                <td>
                <p>Aadhar Number</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($data['aadhar']) ?></p>
                    
                </td>
            </tr>
        </table>

    </div>
    <a href="/" class="btn">Go Back to Home</a>
</body>
</html>
