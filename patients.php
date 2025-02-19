<?php
include 'config.php';

// define or fetch admin profile information
$profileImage = 'path/to/profile/image.jpg'; 
$adminName = 'Admin Name'; 

// define SQL query to fetch patient data
$sql = "SELECT id, full_name, sex, dob, age, contact FROM patients"; 
$result = $conn->query($sql);

$patients = [];
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
    }
} else {
    die("Error fetching patients: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Patient Management</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Lexend", serif; }
        html, body { height: 100%; }
        body { display: flex; }
        .sidebar { width: 320px; background-color: #176B87; color: white; padding: 15px; height: 100%; box-sizing: border-box; }
        .profile { display: flex; align-items: center; margin-bottom: 20px; flex-direction: column; }
        .profile-icon img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; }
        .profile-name { font-size: 18px; padding-top: 10px; }
        aside ul { list-style: none; padding: 0; }
        aside ul li { padding: 25px 10px; }
        aside ul li:hover { border-bottom: 1px solid white; }
        aside ul li a { color: white; text-decoration: none; font-size: 22px; padding: 10px; }
        aside ul li i { font-size: 26px; }
        .main-content { flex-grow: 1; padding: 20px 50px; box-sizing: border-box; overflow-y: auto; }
        header { display: flex; justify-content: space-between; align-items: center; background-color: #176B87; padding: 20px; color: white; border-radius: 20px; }
        header h1 { margin: 0; font-weight: 600; }
        nav { display: flex; justify-content: flex-end; padding: 20px; }
        .search-bar { display: flex; align-items: center; }
        .search-bar input { padding: 8px; margin-right: 10px; border-radius: 10px; width: 15rem; font-size: 14px; border: 2px solid gray; }
        .search-bar button { padding: 10px 15px; background-color: #176B87; color: white; border: none; cursor: pointer; border-radius: 10px; font-size: 14px; }
        .search-bar button:hover { background-color: #09546DFF; }
        .patient-list table { width: 100%; border-collapse: collapse; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4); }
        .patient-list th, .patient-list td { border: 1px solid gray; padding: 10px; text-align: center; }
        .patient-list th { background-color: #B2DBED; color: black; font-weight: 600; }
        .patient-list td .edit, .patient-list td .delete, .patient-list td .add-appointment {
            padding: 10px; color: white; border: none; cursor: pointer; margin-right: 10px; border-radius: 10px;
        }
        .patient-list td .edit { background-color: #CDC113; }
        .patient-list td .edit:hover { background-color: #A79F30FF; }
        .patient-list td .delete { background-color: #C90F12; }
        .patient-list td .delete:hover { background-color: #852426FF; }
        .patient-list td .add-appointment { background-color: #17871B; }
        .patient-list td .add-appointment:hover { background-color: #126D15FF; }
        .pagination { margin-top: 30px; text-align: center; }
        .pagination i { padding: 0px 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <div class="profile-icon">
                <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image">
            </div>
            <div class="profile-name"><?php echo htmlspecialchars($adminName); ?></div>
        </div>
        <aside>
            <ul>
                <li><i class="fa-solid fa-hospital-user"></i> <a href="#">Patient Management</a></li>
                <li><i class="fa-solid fa-calendar-check"></i> <a href="#">Appointments</a></li>
                <li><i class="fa-solid fa-notes-medical"></i> <a href="#">SOAP Notes</a></li>
                <li><i class="fa-solid fa-gear"></i> <a href="#">Settings</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i> <a href="#">Logout</a></li>
            </ul>
        </aside>
    </div>
    <div class="main-content">
        <header>
            <h1>Patient Management</h1>
        </header>
        <nav>
            <div class="search-bar">
                <input type="text" placeholder="Search">
                <button><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                <button><i class="fa-solid fa-user-plus"></i>Add Patient</button>
            </div>
        </nav>

        <section class="patient-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Contact Information</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($patients)): ?>
                        <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($patient['id']); ?></td>
                            <td><?php echo htmlspecialchars($patient['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($patient['sex']); ?></td>
                            <td><?php echo htmlspecialchars($patient['dob']); ?></td>
                            <td><?php echo htmlspecialchars($patient['age']); ?></td>
                            <td><?php echo htmlspecialchars($patient['contact']); ?></td>
                            <td>
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                                <a href="appointment.php"><button class="add-appointment">Add Appointment</button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7">No patients found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
