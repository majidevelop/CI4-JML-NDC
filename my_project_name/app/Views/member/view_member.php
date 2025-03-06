<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        .card {
            background-color: #3686d0;
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
        .btn-back {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div id="memberCard" style="width: 600px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
    
    
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

        <?php if (isset($member['photo'])) : ?>
            <img src="<?= base_url('uploads/' . $member['photo']) ?>" alt="Profile Photo">
        <?php else : ?>
            <img src="<?= base_url('uploads/default.png') ?>" alt="Default Profile Photo">
        <?php endif; ?>
        <h2><?= esc($member['name']) ?></h2>
        <table style="text-align:left;">
            <tr>
                <td>
                <p>Membership No</p>

                </td>
                <td>:</td>
                <td>
                <p> <?= esc($member['membershipID']) ?></p>

                </td>
            </tr>
            
            <tr>
                <td>
                <p>Email</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['email']) ?></p>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                <p>Mobile</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['mobile']) ?></p>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                <p>Address</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['address']) ?></p>
                    
                </td>
            </tr>
            <tr>
                <td><p>
                Blood Group

                </p>
                </td>
                <td>:</td>
                <td> <p>
                <?= esc($member['blood_name']) ?>

                </p>
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
        <p> <?= esc($member['district']) ?></p>
                    
                </td>
            </tr> -->
            <tr>
                <td>
                <p>Pin</p>

                </td>
                <td>:</td>

                <td>
                <p> <?= esc($member['pin']) ?></p>

                </td>
            </tr>
            <tr>
                <td>
                <p>Taluk</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['taluk_name']) ?></p>
                    
                </td>
            </tr>
            <!-- <tr>
                <td>
                <p>Panchayath</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['panchayath']) ?></p>
                    
                </td>
            </tr> -->
            <tr>
                <td>
                <p>Aadhar Number</p>

                </td>
                <td>:</td>

                <td>
        <p> <?= esc($member['aadhar']) ?></p>
                    
                </td>
            </tr>
        </table>

    </div>
</div>

<!-- Download PDF Button -->
<a href="#" class="btn-back" id="downloadPdf">Download as PDF</a>

    <a href="<?= base_url('members') ?>" class="btn-back">Back to Members List</a>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    document.getElementById('downloadPdf').addEventListener('click', function () {
        const memberCard = document.getElementById('memberCard');

        html2canvas(memberCard, { scale: 2 }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();

            const imgData = canvas.toDataURL('image/png');
            const imgWidth = 190; // Adjust width as per A4 paper
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight); // Position: x=10, y=10
            pdf.save('Member_Details.pdf'); // Save the PDF
        });
    });
</script>


</html>
