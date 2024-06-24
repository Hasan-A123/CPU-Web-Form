<?php

require_once 'db_connect.php';

// Escape special characters to prevent SQL injection
$customerId = mysqli_real_escape_string($conn, $_POST['customer_id']);
$customerType = mysqli_real_escape_string($conn, $_POST['customer_type']);
$customerSubType = mysqli_real_escape_string($conn, $_POST['customer_sub_type']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$numLocations = mysqli_real_escape_string($conn, $_POST['num_locations']);
$companyName = mysqli_real_escape_string($conn, $_POST['company_name']);
$contactName = mysqli_real_escape_string($conn, $_POST['contact_name']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
$mobileNumber = mysqli_real_escape_string($conn, $_POST['mobile_number']);
$emailAddress =  mysqli_real_escape_string($conn, $_POST['email_address']);
$street = mysqli_real_escape_string($conn, $_POST['address_street']);
$city = mysqli_real_escape_string($conn, $_POST['address_city']);
$county = mysqli_real_escape_string($conn, $_POST['address_county']);
$postcode = mysqli_real_escape_string($conn, $_POST['address_postcode']);
$annualRevenue = mysqli_real_escape_string($conn, $_POST['annual_revenue']);

// Insert new customer in table Customer
$query = "INSERT INTO customer_prospect_table (customer_id,
    customer_type,
    customer_sub_type,
    status,
    num_locations,
    company_name,
    contact_name,
    title,
    role,
    phone_number,
    mobile_number,
    email_address,
    street,
    city,
    county,
    postcode,
    annual_revenue
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
if ($stmt = $conn->prepare($query)) {
    // Bind parameters to prevent SQL injection
    $stmt->bind_param('sssssssssssssssss', $customerId, $customerType, $customerSubType, $status, $numLocations, $companyName, $contactName, $title, $role, $phoneNumber, $mobileNumber, $emailAddress, $street, $city, $county, $postcode, $annualRevenue);

    // Execute statement
    $stmt->execute();

    // Check for successful insertion
    if ($stmt->affected_rows > 0) {
        echo "<p>Customer data inserted successfully.</p>";
    } else {
        echo "<p>An error has occurred.<br/>The item was not added.</p>";
    }

    // Close statement
    $stmt->close();
} else {
    // Handle error when prepare() fails
    echo "<p>Error: Unable to prepare the SQL statement.</p>";
    echo "<p>Debugging error: " . $conn->error . "</p>";
}

// Close connection
$conn->close();
?>
<!-- HTML Output -->
<html>
<head>
    <title>Computer Parts Unlimited - Customer & Prospect Management Information</title>
</head>
<body>
<h1>Computer Parts Unlimited</h1>
<h2>Customer & Prospect Management Information</h2>
<?php
echo "<p>Customer processed at ";
echo date('H:i, jS F Y');
echo "</p>";
echo '<p>Your customer data is as follows: </p>';
echo 'Customer ID =  ' . htmlspecialchars($customerId) . '<br />';
echo 'Customer Type =  ' . htmlspecialchars($customerType) . '<br />';
echo 'Customer Sub Type =  ' . htmlspecialchars($customerSubType) . '<br />';
echo 'Status =  ' . htmlspecialchars($status) . '<br />';
echo 'Number of Locations =  ' . htmlspecialchars($numLocations) . '<br />';
echo 'Company Name =  ' . htmlspecialchars($companyName) . '<br />';
echo 'Contact Name =  ' . htmlspecialchars($contactName) . '<br />';
echo 'Title =  ' . htmlspecialchars($title) . '<br />';
echo 'Role =  ' . htmlspecialchars($role) . '<br />';
echo 'Phone Number =  ' . htmlspecialchars($phoneNumber) . '<br />';
echo 'Mobile Number =  ' . htmlspecialchars($mobileNumber) . '<br />';
echo 'Email Address =  ' . htmlspecialchars($emailAddress) . '<br />';
echo 'Street =  ' . htmlspecialchars($street) . '<br />';
echo 'City =  ' . htmlspecialchars($city) . '<br />';
echo 'County =  ' . htmlspecialchars($county) . '<br />';
echo 'Postcode =  ' . htmlspecialchars($postcode) . '<br />';
echo 'Annual Revenue =  ' . htmlspecialchars($annualRevenue) . '<br />';
?>
</body>
</html>
