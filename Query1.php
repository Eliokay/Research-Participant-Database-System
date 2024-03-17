<?php
$servername = 'cssql.seattleu.edu';
$username = 'll_eokoloko';
$password = 'Cpsc2300Eokoloko';
$dbname = 'll_eokoloko';

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn){
    die('connection filed: ' . mysqli_connect_error());
}

$sql = "SELECT pi.FirstName, pi.LastName, t.TestName, t.TestDescription
FROM ParticipantInformation pi
INNER JOIN ParticipantTest pt ON pi.ParticipantID = pt.ParticipantID
INNER JOIN Tests t ON pt.TestID = t.TestID;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
echo "<table border = '1'>\n";
// output data of each row
while($row = mysqli_fetch_row($result)) {
echo "<tr>\n";
for ($i = 0; $i < mysqli_num_fields($result); $i++) {
echo "<td>" . $row[$i] . "</td>\n";
}
echo "</tr>\n";
}
echo "</table>\n";
} else {
echo "0 results";
}
mysqli_free_result($result);
mysqli_close($conn);
?>

