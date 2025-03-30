<?php
// Start the session to store booking details
session_start();

// Retrieve booking details from POST request
$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Store booking details in session variables
$_SESSION['ORDER_ID'] = $ORDER_ID;
$_SESSION['CUST_ID'] = $CUST_ID;
$_SESSION['TXN_AMOUNT'] = $TXN_AMOUNT;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .modal-content {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Processing Your Booking...</h2>
        <p>Please wait while we process your booking details.</p>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Enter M-PESA Confirmation Code</h5>
                </div>
                <div class="modal-body">
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="mpesaCode">M-PESA 10-Digit Code</label>
                            <input type="text" class="form-control" id="mpesaCode" maxlength="10" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Payment Successful</h5>
                </div>
                <div class="modal-body">
                    <p>Thank you! Your payment has been successfully processed.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Show payment modal after 2 seconds
            setTimeout(function() {
                $('#paymentModal').modal('show');
            }, 2000);

            // Handle payment form submission
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();
                var mpesaCode = $('#mpesaCode').val().trim();

                // Validate M-PESA code
                if (mpesaCode.length === 10 && $.isNumeric(mpesaCode)) {
                    // Simulate payment processing
                    $('#paymentModal').modal('hide');
                    $('#successModal').modal('show');

                    // Redirect to home page after 3 seconds
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000);
                } else {
                    alert('Please enter a valid 10-digit M-PESA code.');
                }
            });
        });
    </script>
</body>
</html>
