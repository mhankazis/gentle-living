<!DOCTYPE html>
<html>
<head>
    <title>Test Transaction Creation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Test Transaction Creation - FIXED VERSION</h1>
    
    <div id="status"></div>
    
    <button onclick="testTransaction()">Test Create Transaction</button>
    
    <div id="result"></div>

    <script>
        function testTransaction() {
            $('#status').html('Creating transaction...');
            const startTime = Date.now();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: '{{ route("transactions.store") }}',
                method: 'POST',
                data: {
                    customer_id: 1, // Walk-in Customer
                    payment_method_id: 1, // Cash
                    items: [
                        {
                            product_id: 1,
                            quantity: 2,
                            price: 50000
                        }
                    ],
                    discount: 0
                },
                success: function(response) {
                    const endTime = Date.now();
                    const duration = endTime - startTime;
                    $('#status').html(`<span style="color: green">SUCCESS! ✅</span>`);
                    $('#result').html(`
                        <h3>Transaction Created Successfully!</h3>
                        <p><strong>Duration:</strong> ${duration}ms</p>
                        <p><strong>Response:</strong> Transaction created and redirected</p>
                        <p><strong>Status:</strong> No more infinite loops or hanging! 🎉</p>
                    `);
                },
                error: function(xhr, status, error) {
                    const endTime = Date.now();
                    const duration = endTime - startTime;
                    $('#status').html(`<span style="color: red">ERROR ❌</span>`);
                    $('#result').html(`
                        <h3>Error Details:</h3>
                        <p><strong>Duration:</strong> ${duration}ms</p>
                        <p><strong>Status:</strong> ${xhr.status}</p>
                        <p><strong>Error:</strong> ${error}</p>
                        <p><strong>Response:</strong> ${xhr.responseText}</p>
                    `);
                }
            });
        }
    </script>
</body>
</html>
