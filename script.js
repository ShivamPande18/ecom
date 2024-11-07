// Insert Sample Data
function insertSampleData() {
    fetch('insert_sample_data.php')
        .then(response => response.text())
        .then(data => {
            alert(data)
            // document.getElementById('sampleDataMessage').innerText = data;
        })
        .catch(error => console.error('Error:', error));
}

// Place an Order
function placeOrder(event) {
    event.preventDefault();

    const product_id = document.getElementById('product_id').value;
    const order_quantity = document.getElementById('order_quantity').value;

    if (order_quantity <= 0) {
        alert("ERROR: Can not Place zero orders")
    }
    else {

        fetch('place_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `product_id=${product_id}&order_quantity=${order_quantity}`
        })
            .then(response => response.text())
            .then(data => {
                alert(data)
            })
            .catch(error => console.error('Error:', error));
    }


}

// Get Product Information
function getProductInfo(event) {
    event.preventDefault();

    const info_product_id = document.getElementById('info_product_id').value;

    fetch(`get_product_info.php?product_id=${info_product_id}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('productInfo').innerHTML = data;
            document.getElementById('infoForm').reset();
        })
        .catch(error => console.error('Error:', error));
}
