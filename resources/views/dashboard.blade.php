<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
    <title>Barbershop Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            background: url(asset/staff.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;

        }

        .sidebar {
            position: fixed;
            left: -250px;
            width: 200px;
            height: 100%;
            background-color: #222;
            color: #fff;
            padding: 20px;
            transition: all .5s ease;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 1rem;
        }

        .sidebar a {
            display: block;
            padding: 0.5rem;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #333;
        }

        .sidebar ul ul {
            display: none;
        }

        .sidebar li:hover > ul {
            display: block;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
        #check{
            display: none;
        }
        label #btn,label #cancel{
            position: absolute;
            cursor: pointer;
            background: #042331;
            border-radius: 3px
        }
        label #btn{
            left: 40px;
            top: 25px;
            font-size: 35px;
            color: white;
            padding: 6px 12px;
            transition: all .5s;
        }
        label #cancel{
            z-index: 1111;
            left: -195px;
            top: 17px;
            font-size: 30px;
            color: #0a5275;
            padding: 4px 9px;
            transition: all .5s ease;
        }
        #check:checked ~ .sidebar{
            left: 0;
        }
        #check:checked ~ label #btn{
            left: 250px;
            opacity: 0;
            pointer-events: none;
        }
        #check:checked ~ label #cancel{
            left: 150px;
        }
        #check:checked ~ section{
            margin-left: 250
        }

        section{
            background: url(asset/staff.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
        }
        .profile {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .price-list {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }

        .price-list h2 {
            margin-bottom: 10px;
        }

        .price-list ul {
            list-style-type: none;
            padding: 0;
        }

        .price-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <h2>ASGAR - STUDIO</h2>
        <ul>
            <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#Appointment"><i class="fas fa-calendar-alt"></i> Appointment</a></li>
            <li><a href="#customers"><i class="fas fa-users"></i> Customers</a></li>
            <li><a href="#reports"><i class="fas fa-chart-bar"></i> Reports</a></li>
        </ul>
    </div>
    <section></section>
    <div class="content">
        <!-- Your main content will be placed here -->
    </div>

    <div class="profile">
      <img src="asset/staff.jpg" alt="Profile Picture" class="profile-picture">
      <div class="profile-info">
        <h2 id="profile-name">John Doe</h2>
        <p id="profile-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <button id="edit-profile">Edit Profile</button>
      </div>
    </div>
    <script>
        const editProfileBtn = document.getElementById("edit-profile");
        const profileName = document.getElementById("profile-name");
        const profileDescription = document.getElementById("profile-description");

        editProfileBtn.addEventListener("click", function() {
        const newName = prompt("Masukkan nama baru:");
        const newDescription = prompt("Masukkan deskripsi baru:");

        if (newName) {
            profileName.textContent = newName;
        }

        if (newDescription) {
            profileDescription.textContent = newDescription;
        }
        });
    </script>
    <div class="price-list" id="price-list">
      <h2>Price List</h2>
      <ul>
        <li>Haircut: $20</li>
        <li>Shave: $15</li>
        <li>Beard Trim: $10</li>
      </ul>
    </div>

</body>
</html>