<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #cccccc;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//echo $q = intval($_GET['q']);
//echo $q = '0'.intval($_GET['q']);
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','pundro_demo1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"pundro_demo1");
$sql="SELECT * FROM semester_particulars WHERE SemesterName = '1' AND ProgramName = '1' AND BatchName = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Particulars</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td>
            <h3><?php echo $row['Particulars']?></h3>
        </td>
        <td>
            <input type="text" name="ID" value="<?php echo $row['Amount']?>">
        </td>
    </tr>
    <?php
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>