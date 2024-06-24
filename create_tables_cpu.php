<?php
require_once 'db_connect.php';

// Check if the connection is successful
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

echo "<p>File processed at " . date('H:i, jS F Y') . "</p>";

// Drop legacy tables
$dropTables = array("Customer", "Company", "Lead", "Contact");
foreach ($dropTables as $table) {
    $sql = "DROP TABLE IF EXISTS $table";
    if (mysqli_query($conn, $sql)) {
        echo "Table $table dropped successfully.<br>";
    } else {
        echo "Error dropping table $table: " . mysqli_error($conn) . "<br>";
    }
}

// Create table Company
$sql = "CREATE TABLE Company (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    type VARCHAR(30),
    sub_type VARCHAR(30),
    status VARCHAR(30),
    annual_revenue VARCHAR(30),
    number_of_locations VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Company created successfully.<br>";
} else {
    echo "Error creating table Company: " . mysqli_error($conn) . "<br>";
}

// Create table Lead
$sql = "CREATE TABLE Lead (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    source VARCHAR(30),
    status VARCHAR(30),
    reason_disqualified VARCHAR(50),
    type VARCHAR(30),
    current_component_vendor_id INT(11),
    rating VARCHAR(4),
    contact_id INT(11)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Lead created successfully.<br>";
} else {
    echo "Error creating table Lead: " . mysqli_error($conn) . "<br>";
}

// Create table Contact
$sql = "CREATE TABLE Contact (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(50),
    title VARCHAR(10),
    role VARCHAR(30),
    phone_number VARCHAR(20),
    mobile_number VARCHAR(20),
    email_address VARCHAR(50),
    personal_linkedin_profile VARCHAR(50),
    street VARCHAR(30),
    city VARCHAR(30),
    county VARCHAR(30),
    country VARCHAR(30),
    postcode VARCHAR(30),
    status VARCHAR(30),
    company_id INT(6),
    annual_revenue VARCHAR(15)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Contact created successfully.<br>";
} else {
    echo "Error creating table Contact: " . mysqli_error($conn) . "<br>";
}

// Create table customer_prospect_table
$sql = "CREATE TABLE IF NOT EXISTS customer_prospect_table (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(10),
    customer_type VARCHAR(50),
    customer_sub_type VARCHAR(50),
    status VARCHAR(50),
    num_locations INT(10),
    company_name VARCHAR(50),
    contact_name VARCHAR(50),
    title VARCHAR(10),
    role VARCHAR(30),
    phone_number VARCHAR(20),
    mobile_number VARCHAR(20),
    email_address VARCHAR(50),
    street VARCHAR(30),
    city VARCHAR(30),
    county VARCHAR(30),
    postcode VARCHAR(30),
    annual_revenue VARCHAR(50)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table customer_prospect_table created successfully.<br>";
} else {
    echo "Error creating table customer_prospect_table: " . mysqli_error($conn) . "<br>";
}

// Insert test data
$sqls = array(
    "INSERT INTO Lead (source, status, reason_disqualified, type, rating) VALUES ('Website', 'New', 'Bad information', 'Commercial', 'C')",
    "INSERT INTO Company (name, type, sub_type, status, number_of_locations) VALUES ('Bobs Auto', 'Prospect', 'Commercial', 'Active', '2')",
    "INSERT INTO Contact (company_id, contact_name, title, role, phone_number, mobile_number, email_address, street, city, county, country, postcode, status, annual_revenue) VALUES (1, 'Robert Bolton', 'Mr', 'Manager', '0113 123456', '07777777777', 'bob@bobsauto.co.uk', 'Car Lane', 'Leeds', 'West Yorkshire', 'UK', 'LS11AA', 'Active', 'Not disclosed')",
    "INSERT INTO customer_prospect_table (customer_id, customer_type, customer_sub_type, status, num_locations, company_name, contact_name, title, role, phone_number, mobile_number, email_address, street, city, county, postcode, annual_revenue) VALUES (1, 'Prospect', 'Commercial', 'Active', 10, 'CPU', 'Alan', 'Mr', 'Manager', '07123471911', '0234567801', 'alan123@gmail.com', '1 Town Street', 'Leeds', 'West Yorkshire', 'LS1 123', 'Not disclosed')"
);

foreach ($sqls as $sql) {
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully.<br>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn) . "<br>";
    }
}

// Close the connection after all operations
mysqli_close($conn);
?>
