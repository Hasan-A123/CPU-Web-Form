<?php

require_once 'db_connect.php';

echo "<p>File processed at ";
echo date('H:i, jS F Y');
echo "</p>";
	  
// Drop legacy tables
if (mysqli_query($conn, "DROP TABLE Companies")) {
    echo "Table Companies dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP TABLE Leads")) {
    echo "Table Leads dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP TABLE Contacts")) {
    echo "Table Contacts dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP TABLE Customers")) {
    echo "Table Customers dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";
echo "<br>";

// Drop current tables
if (mysqli_query($conn, "DROP TABLE Customer")) {
    echo "Table Customer dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP customer_prospect_table")) {
    echo "customer_prospect_table dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP TABLE Lead")) {
    echo "Table Lead dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";

if (mysqli_query($conn, "DROP TABLE Contact")) {
    echo "Table Contact dropped successfully.";
} else {
    echo "Error dropping table. " . mysqli_error($conn);
}
echo "<br>";
echo "<br>";

mysqli_close($conn);
?>