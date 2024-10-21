<?php
include 'db_connection.php';

// Fetch doctors for the dropdown
$doctor_sql = "SELECT DoctorID, name FROM doctors";
$doctor_result = $conn->query($doctor_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>View Appointments</h2>
    <form action="" method="get">

        <label for="doctor_id">Select Doctor:</label>
        <select name="doctor_id" id="doctor_id">
            <option value="">-- Select Doctor --</option>
            <?php
            if ($doctor_result->num_rows > 0) {
                while ($doctor_row = $doctor_result->fetch_assoc()) {
                    echo "<option value='" . $doctor_row['DoctorID'] . "'>" . $doctor_row['name'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="View Appointments">
    </form>

    <?php
    // Check if a doctor has been selected
    if (isset($_GET['doctor_id'])) {
        $doctor_id = $_GET['doctor_id'];

        if ($doctor_id) {
            $sql = "SELECT appointments.AppointmentID, patients.name AS PatientName, appointments.appointmentDate, appointments.reason 
                    FROM appointments 
                    JOIN patients ON appointments.PatientID = patients.PatientID 
                    WHERE DoctorID = '$doctor_id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Appointments for Doctor ID: $doctor_id</h3>";
                echo "<table>";
                echo "<tr><th>Appointment ID</th><th>Patient Name</th><th>Date</th><th>Reason</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["AppointmentID"] . "</td><td>" . $row["PatientName"] . "</td><td>" . $row["appointmentDate"] . "</td><td>" . $row["reason"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No appointments found for this doctor.";
            }
        } else {
            echo "Please select a doctor.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
