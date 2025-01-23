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
    
    <div style="text-align: center;">
        <h2 style="color: #2c3e50;">Member Details</h2>
    </div>
    <div style="display:flex;">
    <div style="text-align: center; margin-bottom: 15px;width:200px;">
        <img src="<?= base_url('uploads/' . esc($member['photo'])) ?>" alt="Profile Photo" 
             style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
    </div>
    <div>
        <p><strong>Name:</strong> <?= esc($member['name']) ?></p>
        <p><strong>Email:</strong> <?= esc($member['email']) ?></p>
        <p><strong>Mobile:</strong> <?= esc($member['mobile']) ?></p>
        <p><strong>Address:</strong> <?= esc($member['address']) ?></p>
        <p><strong>State:</strong> <?= esc($member['state']) ?></p>
        <p><strong>District:</strong> <?= esc($member['district']) ?></p>
        <p><strong>Pin:</strong> <?= esc($member['pin']) ?></p>
        <p><strong>Taluk:</strong> <?= esc($member['taluk']) ?></p>
        <p><strong>Panchayath:</strong> <?= esc($member['panchayath']) ?></p>
        <p><strong>Aadhar:</strong> <?= esc($member['aadhar']) ?></p>
    </div>
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
