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

$sql = "SELECT 
s.StudyID,
AVG(YEAR(CURDATE()) - YEAR(pi.DOB)) AS AverageAge
FROM ParticipantInformation pi
INNER JOIN ParticipantStudy ps ON pi.ParticipantID = ps.ParticipantID  
INNER JOIN Study s ON ps.StudyID = s.StudyID
GROUP BY s.StudyID;";
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