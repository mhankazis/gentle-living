<!DOCTYPE html>
<html>
<head>
    <title>Test Transaction Fix</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Test Transaction Performance Fix</h1>
    
    <form id="test-transaction-form" method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div>
            <label>Customer:</label>
            <select name="customer_id">
                <option value="">Walk-in Customer</option>
                <option value="1">Test Customer</option>
            </select>
        </div>
        
        <div>
            <label>Payment Method:</label>
            <select name="payment_method_id" required>
                <option value="1">Cash</option>
                <option value="2">Transfer</option>
            </select>
        </div>
        
        <div>
            <label>Items:</label>
            <div>
                <input type="hidden" name="items[0][product_id]" value="1">
                <input type="text" value="Test Product" readonly>
                <input type="number" name="items[0][quantity]" value="1" min="1">
                <input type="number" name="items[0][price]" value="10000" min="0">
            </div>
        </div>
        
        <div>
            <label>Discount:</label>
            <input type="number" name="discount" value="0" min="0">
        </div>
        
        <button type="submit" id="submit-btn">Create Transaction</button>
    </form>
    
    <div id="result" style="margin-top: 20px;"></div>
    
    <script>
        $(document).ready(function() {
            $('#test-transaction-form').on('submit', function(e) {
                e.preventDefault();
                
                $('#submit-btn').prop('disabled', true).text('Processing...');
                $('#result').html('<p style="color: blue;">Testing transaction creation...</p>');
                
                var startTime = Date.now();
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var endTime = Date.now();
                        var duration = endTime - startTime;
                        
                        $('#result').html('<p style="color: green;">✓ Transaction created successfully in ' + duration + 'ms</p>');
                        $('#submit-btn').prop('disabled', false).text('Create Transaction');
                    },
                    error: function(xhr) {
                        var endTime = Date.now();
                        var duration = endTime - startTime;
                        
                        $('#result').html('<p style="color: red;">✗ Error after ' + duration + 'ms: ' + xhr.responseText + '</p>');
                        $('#submit-btn').prop('disabled', false).text('Create Transaction');
                    }
                });
            });
        });
    </script>
</body>
</html>
