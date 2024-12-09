<?php
// Include the database configuration file
include 'config.php';
include 'navbar.php';
// Check if an invoice ID is passed for editing
$invoiceId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$invoice = [];

if ($invoiceId > 0) {
    // Fetch the invoice data from the database if editing
    $result = $conn->query("SELECT * FROM invoices WHERE id = $invoiceId");
    if ($result) {
        $invoice = $result->fetch_assoc();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $invoiceId = isset($_POST['invoice_id']) ? intval($_POST['invoice_id']) : 0;
    $customerName = $_POST['customer_name'];
    $serviceType = $_POST['service_type'];
    $fromDate = $_POST['from_date'];
    $endDate = $_POST['end_date'];
    $duration = $_POST['duration'];
    $baseCharges = $_POST['base_charges'];
    $totalAmount = $_POST['total_amount'];
    $status = $_POST['status'];

    if ($invoiceId > 0) {
        // Update existing invoice
        $query = "UPDATE invoices SET 
                    customer_name = ?, 
                    service_type = ?, 
                    from_date = ?, 
                    end_date = ?, 
                    duration = ?, 
                    base_charges = ?, 
                    total_amount = ?, 
                    status = ? 
                  WHERE id = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssssdiisi", $customerName, $serviceType, $fromDate, $endDate, $duration, $baseCharges, $totalAmount, $status, $invoiceId);
            if ($stmt->execute()) {
                // Redirect back to the table page with a success message
                header("Location: view_invoice.php?msg=Record updated successfully");
                exit();
            } else {
                echo "Error updating record: " . $stmt->error;
            }
        }
    } else {
        // Insert new invoice
        $query = "INSERT INTO invoices (customer_name, service_type, from_date, end_date, duration, base_charges, total_amount, status) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssssdiis", $customerName, $serviceType, $fromDate, $endDate, $duration, $baseCharges, $totalAmount, $status);
            if ($stmt->execute()) {
                // Redirect back to the table page with a success message
                header("Location: view_invoice.php?msg=Record added successfully");
                exit();
            } else {
                echo "Error inserting record: " . $stmt->error;
            }
        }
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Invoice</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .input-field-container {
      position: relative;
      margin-bottom: 15px;
    }

    .input-label {
      position: absolute;
      top: -10px;
      left: 10px;
      background-color: white;
      padding: 0 5px;
      font-size: 14px;
      font-weight: bold;
      color: #A26D2B;
    }

    .styled-input {
      width: 100%;
      padding: 10px;
      font-size: 12px;
      outline: none;
      box-sizing: border-box;
      border: 1px solid #A26D2B;
      border-radius: 5px;
    }

    .styled-input:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    h3 {
      color: #A26D2B;
    }

  </style>
</head>
<body>
  <div class="container mt-7">
    <h3 class="mb-4">Invoicing Form</h3>
    <form method="POST" onsubmit="return validateForm()">
      <input type="hidden" name="invoice_id" value="<?php echo $invoiceId > 0 ? $invoiceId : ''; ?>" />
      <div class="row">
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Customer Name</label>
            <input type="text" name="customer_name" class="styled-input" placeholder="Enter Customer Name" value="<?php echo $invoiceId > 0 ? $invoice['customer_name'] : ''; ?>" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Service Type</label>
            <select class="styled-input" name="service_type" required>
              <option value="" disabled>Select Service Type</option>
              <option value="fully_trained_nurse" <?php echo ($invoiceId > 0 && $invoice['service_type'] == 'fully_trained_nurse') ? 'selected' : ''; ?>>Fully Trained Nurse</option>
              <option value="semi_trained_nurse" <?php echo ($invoiceId > 0 && $invoice['service_type'] == 'semi_trained_nurse') ? 'selected' : ''; ?>>Semi Trained Nurse</option>
              <option value="care_taker" <?php echo ($invoiceId > 0 && $invoice['service_type'] == 'care_taker') ? 'selected' : ''; ?>>Care Taker</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">From Date</label>
            <input type="date" class="styled-input" name="from_date" id="fromDate" value="<?php echo $invoiceId > 0 ? $invoice['from_date'] : ''; ?>" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">End Date</label>
            <input type="date" class="styled-input" name="end_date" id="endDate" value="<?php echo $invoiceId > 0 ? $invoice['end_date'] : ''; ?>" required />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Duration (Days)</label>
            <input type="number" class="styled-input" id="durationDays" name="duration" value="<?php echo $invoiceId > 0 ? $invoice['duration'] : ''; ?>" placeholder="Auto-calculated" readonly />
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Base Charges</label>
            <input type="number" class="styled-input" name="base_charges" value="<?php echo $invoiceId > 0 ? $invoice['base_charges'] : ''; ?>" placeholder="Enter Base Charges" required />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Total Amount</label>
            <input type="number" class="styled-input" name="total_amount" value="<?php echo $invoiceId > 0 ? $invoice['total_amount'] : ''; ?>" placeholder="Enter Total Amount" required />
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-field-container">
            <label class="input-label">Status</label>
            <select class="styled-input" name="status" required>
              <option value="" disabled>Select Status</option>
              <option value="paid" <?php echo ($invoiceId > 0 && $invoice['status'] == 'paid') ? 'selected' : ''; ?>>Paid</option>
              <option value="pending" <?php echo ($invoiceId > 0 && $invoice['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
              <option value="partially_paid" <?php echo ($invoiceId > 0 && $invoice['status'] == 'partially_paid') ? 'selected' : ''; ?>>Partially Paid</option>
            </select>
          </div>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary mt-3"><?php echo $invoiceId > 0 ? 'Update' : 'Submit'; ?></button>
    </form>
  </div>

  <script>
    // Auto-calculate the duration
    const fromDate = document.getElementById('fromDate');
    const endDate = document.getElementById('endDate');
    const durationDays = document.getElementById('durationDays');

    function calculateDuration() {
      if (fromDate.value && endDate.value) {
        const start = new Date(fromDate.value);
        const end = new Date(endDate.value);
        const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
        durationDays.value = diff > 0 ? diff : 0;
      }
    }

    fromDate.addEventListener('change', calculateDuration);
    endDate.addEventListener('change', calculateDuration);
  </script>
</body>
</html>

