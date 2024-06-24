<?php
require_once 'db_connect.php';

$sql = "SELECT * FROM customer_prospect_table"; 
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Handle query execution error (optional)
    echo "Error executing query: " . mysqli_error($conn);
    exit;
}

$customers = array();

while ($row = mysqli_fetch_array($result)) {
    $customers[] = $row;
}

mysqli_close($conn);
?>

<html>
<head>
<title> Customer & Prospect Information </title>
</head>
<body>
<h2>Customer/Prospect List</h2>
<table border=1>
<tr>
    <th>Customer ID</th> <th>Type</th>
    <th>Sub-Type (Optional)</th>
    <th>Status</th>
    <th>Number of Locations</th>
    <th>Company Name</th>
    <th>Contact Name</th>
    <th>Title</th>
    <th>Role</th>
    <th>Phone Number</th>
    <th>Mobile Number (Optional)</th>
    <th>Email</th>
    <th>Street Address</th>
    <th>City</th>
    <th>County (Optional)</th>
    <th>Post Code</th>
    <th>Annual Revenue (Optional)</th>
</tr>
<?php foreach ($customers as $customer): ?>
<tr>
    <td>
        <?php echo $customer["customer_id"]; ?>
    </td>
    <td>
        <?php echo $customer["customer_type"]; ?>
    </td>
    <td>
        <?php echo $customer["customer_sub_type"] ?: 'N/A';  // Display "N/A" if sub-type is null ?>
    </td>
    <td>
        <?php echo $customer["status"]; ?>
    </td>
    <td>
        <?php echo $customer["num_locations"]; ?>
    </td>
    <td>
        <?php echo $customer["company_name"]; ?>
    </td>
    <td>
        <?php echo $customer["contact_name"]; ?>
    </td>
    <td>
        <?php echo $customer["title"]; ?>
    </td>
    <td>
        <?php echo $customer["role"]; ?>
    </td>
    <td>
        <?php echo $customer["phone_number"]; ?>
    </td>
    <td>
        <?php echo $customer["mobile_number"] ?: 'N/A'; ?>
    </td>
    <td>
        <?php echo $customer["email_address"]; ?>
    </td>
    <td>
        <?php echo $customer["street"]; ?>
    </td>
    <td>
        <?php echo $customer["city"]; ?>
    </td>
    <td>
        <?php echo $customer["county"] ?: 'N/A'; ?>
    </td>
    <td>
        <?php echo $customer["postcode"]; ?>
    </td>
    <td>
        <?php echo $customer["annual_revenue"] ?: 'N/A'; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
<br>
</body>
</html>
