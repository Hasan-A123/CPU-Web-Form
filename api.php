<?php
require_once 'db_connect.php';
$response = array();

if(isset($_GET['apicall'])){
    switch($_GET['apicall']){
        case 'view':
            $sql = "SELECT * FROM customer_prospect_table";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Error in SQL query: " . mysqli_error($conn));
            }
            $leads = array();
            while($row = mysqli_fetch_array($result)){
                $leads[] = $row;
            }
            mysqli_close($conn);
            $response['Customer'] = $leads;
            echo json_encode($response);
            break; // Added break statement here

        case 'insert':
            $customerId = $_POST['customer_id'];
            $customerType = $_POST['customer_type'];
            $customerSubType = $_POST['customer_sub_type'];
            $status = $_POST['status'];
            $numLocations = $_POST['num_locations'];
            $companyName = $_POST['company_name'];
            $contactName = $_POST['contact_name'];
            $title = $_POST['title'];
            $role = $_POST['role'];
            $phoneNumber = $_POST['phone_number'];
            $mobileNumber = $_POST['mobile_number'];
            $emailAddress = $_POST['email_address'];
            $street = $_POST['address_street'];
            $city = $_POST['address_city'];
            $county = $_POST['address_county'];
            $postcode = $_POST['address_postcode'];
            $annualRevenue = $_POST['annual_revenue'];

            // Insert new customer in table Customer
            $query = "INSERT INTO customer_prospect_table (
                customer_id, customer_type, customer_sub_type, status, num_locations, company_name,
                contact_name, title, role, phone_number, mobile_number, email_address, street,
                city, county, postcode, annual_revenue
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($query)) { // Check if prepare() was successful
                $stmt->bind_param('isssissssssssssss', 
                    $customerId, $customerType, $customerSubType, $status, $numLocations, $companyName,
                    $contactName, $title, $role, $phoneNumber, $mobileNumber, $emailAddress, $street,
                    $city, $county, $postcode, $annualRevenue
                );
                if ($stmt->execute()) { // Check if execute() was successful
                    echo "<p>Customer data inserted successfully.</p>";
                } else {
                    echo "<p>An error has occurred.<br/>The item was not added.</p>";
                }
            } else {
                echo "<p>Failed to prepare the SQL statement.</p>";
            }
            $conn->close();
            break; // Added break statement here
    }
}
?>
