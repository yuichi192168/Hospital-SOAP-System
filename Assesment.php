<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SOAP Notes</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            font-family: 'Lexend', sans-serif;
            overflow: hidden;
            height: 100vh;
            font-family: lexend;
        }
        .sidebar {
            width: 280px;
            background-color: #176B87;
            color: white;
            padding: 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-icon {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .profile-name {
            font-size: 18px;
            font-weight: bold;
        }
        aside ul {
            list-style: none;
            width: 100%;
        }
        aside ul li {
            padding: 15px;
            text-align: left;
        }
        aside ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: auto;
        }
        header {
            width: 100%;
            background-color: #176B87;
            padding: 15px;
            color: white;
            border-radius: 10px;
            text-align: left;
            margin-bottom: 20px;
        }
        .dropdown{
            margin-left: 85%;
            margin-bottom: 2%;
            background: white;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dropdown select {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        }
        .soap-section {
            background: #d1e7f1;
            padding: 20px;
            border-radius: 10px;
            width: 110%;
            max-width: 1030px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .save-btn {
            background: green;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
        }
        .footer-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            width: 90%;
            max-width: 800px;
        }
        .footer-buttons button {
            padding: 10px 15px;
            border: none;
            background: #1e586e;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            flex: 1;
        }
        .footer-buttons .assesment-btn {
            background: #B2DBED;
            color: black;
        }
        @media (max-width: 768px) {
            body {
                flex-direction: column;
                overflow-y: auto;
            }
            .sidebar {
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px;
            }
            .profile {
                display: none;
            }
            .main-content {
                padding: 10px;
            }
            .footer-buttons {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <div class="profile-icon"></div>
            <div class="profile-name">Admin01</div>
        </div>
        <aside>
            <ul>
                <li><a href="#"><i class="fa-solid fa-hospital-user"></i> Patient Management</a></li>
                <li><a href="#"><i class="fa-solid fa-calendar-check"></i> Appointments</a></li>
                <li><a href="#"><i class="fa-solid fa-notes-medical"></i> SOAP Notes</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
                <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </aside>
    </div>
    <div class="main-content">
        <header>
            <h1>Assesment</h1>
        </header>
        <div class="dropdown">
    <select>
        <option value="" disabled selected>Select a patient</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
</div>
        <section class="soap-section">
            <div class="form-container">
                <label>Primary Diagnosis:</label>
                <input type="text">
                <label>Differential Diagnosis:</label>
                <input type="text">
                <button class="save-btn">Save</button>
            </div>
        </section>
        <div class="footer-buttons">
            <button onclick="location.href='Subjective.php'">Subjective</button>
            <button onclick="location.href='Objective.php'">Objective</button>
            <button class="assesment-btn">Assesment</button>
            <button onclick="location.href='Plan.php'">Plan</button>
        </div>
    </div>
</body>
</html>