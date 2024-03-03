function updateQuantity(newQuantity) {
    // You can update the $quantity variable here with the new value
    // For example, you can send the new value to the server via AJAX or use it for other purposes.
    // This is a simplified example just for illustration.
    // Assuming you have a PHP script that handles updating the quantity:
    
    // You can use fetch or any other method to send the data to the server.
    fetch('update_quantity.php', {
        method: 'POST',
        body: JSON.stringify({ quantity: newQuantity }),
        headers: {
        'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
        return response.text();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        // Handle the server's response here if needed
        console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}