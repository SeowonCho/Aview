<head>
    <style>
        table{
            font-family: arial, sans-serfi;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        
        }
        </style>
        </head>

<?php
$x=$_POST['firstname'];
$y=$_POST['lastname'];
$z=$_POST['reviews'];
$m=$_POST['goods'];
$n=$_POST['bads'];
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname="db2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);

}
echo "Connected successfully";
$sql = "INSERT INTO `user` (`fname`, `lname`, `rvw`, `adv`, `dadv`) VALUES ('$x','$y','$z','$m','$n')";

if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}
$sql = "SELECT id, fname, lname, rvw, adv, dadv FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> id: " . $row["id"]. " </td><td> Name: " . $row["fname"]. " " . $row["lname"]. "</td><td> Reviews: " . $row["rvw"]. "</td><td> Goods: " . $row["adv"]. "</td><td> Bads: " . $row["dadv"]. "</td></tr>";

    }
    echo"</table>";
} else {
    echo "0 results";

}
$conn->close();
?>