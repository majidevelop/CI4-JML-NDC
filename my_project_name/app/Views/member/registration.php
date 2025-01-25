<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Registration</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* width: 400px; */
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-container .form-group {
            margin-bottom: 15px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="file"],
        .form-container input[type="tel"],
        .form-container select {
            width: 100%;
            padding: 10px 0px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Member Registration</h2>
        <div>
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <form action="/member/register" method="POST" enctype="multipart/form-data" >

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <div class="error" id="nameError"></div>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="tel" id="mobile" name="mobile" required>
                <div class="error" id="mobileError"></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div class="error" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
                <div class="error" id="addressError"></div>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required>
                <div class="error" id="stateError"></div>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" id="district" name="district" required>
                <div class="error" id="districtError"></div>
            </div>
            <div class="form-group">
                <label for="pin">Pin</label>
                <input type="text" id="pin" name="pin" required>
                <div class="error" id="pinError"></div>
            </div>
            <div class="form-group">
                <select name="taluk" id="taluk" required>
                    <option value="">Select Taluk</option>
                    <?php foreach ($taluks as $taluk): ?>
                        <option value="<?= esc($taluk['ID']) ?>"><?= esc($taluk['LocationName']) ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="error" id="talukError"></div>
            </div>
            <!-- <div class="form-group">
                <label for="panchayath">Panchayath</label>
                <input type="text" id="panchayath" name="panchayath" required>
                <div class="error" id="panchayathError"></div>
            </div> -->
            <div class="form-group">
                <label for="photo">Profile Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
                <div class="error" id="photoError"></div>
            </div>
            <div class="form-group">
                <label for="aadhar">Aadhar Number</label>
                <input type="text" id="aadhar" name="aadhar" required>
                <div class="error" id="aadharError"></div>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
    /*document.querySelector('form').addEventListener('submit', function (e) {
        const mobile = document.getElementById('mobile').value;
        const pin = document.getElementById('pin').value;
        const aadhar = document.getElementById('aadhar').value;

        // Check if mobile is a valid 10-digit number
        if (!/^\d{10}$/.test(mobile)) {
            alert('Please enter a valid 10-digit mobile number.');
            e.preventDefault();
            return;
        }

        // Check if PIN is a valid 6-digit number
        if (!/^\d{6}$/.test(pin)) {
            alert('Please enter a valid 6-digit PIN code.');
            e.preventDefault();
            return;
        }

        // Check if Aadhar is a valid 12-digit number
        if (!/^\d{12}$/.test(aadhar)) {
            alert('Please enter a valid 12-digit Aadhar number.');
            e.preventDefault();
            return;
        }
    }); */
</script>

</body>
</html>
