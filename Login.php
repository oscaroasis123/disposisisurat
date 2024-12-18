<?php
session_start();

if (isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./index.html");</script>';
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN PAGE</title>
    <style>
        body {
            background-image: url('gapura.jpg'); /* Replace 'gapura.jpg' with your image filename */
            background-repeat: no-repeat; /* Adjust background repeat behavior (optional) */
            background-position: center; /* Adjust background position (optional) */
            background-size: cover; /* Adjust background size (optional) */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 300px;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .marquee span {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 15s linear infinite;
            color: white; /* Changed the font color to white */
        }
        @keyframes marquee {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(-100%, 0);
            }
        }
        img {
            margin-bottom: 10px;
        }
        form {
            margin: 0;
            width: 100%; /* Ensures the form takes the full width of the login box */
        }
        input[type="email"],
        input[type="password"] {
            margin-bottom: 10px;
            width: calc(100% - 20px); /* Adjusted to fit inside the box */
            padding: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="marquee">
        <span><h1 style="color: white;"> >>>>>>>>>>>> DISPOSISI SURAT UNIVERSITAS PGRI WIRANEGARA PASURUAN 2024 <<<<<<<<<<<</h1></span>
    </div>
    <div class="login-box">
        <h2>Login Sesuai Harapan!!</h2>
        <img src="Uniwara-removebg-preview.png" alt="Uniwara" width="100" height="100"> <br>
        <form action="./ceklogin.php" method="post">
            <input type="email" name="email" placeholder="Username" alt="email" required="required"/><br/>
            <input type="password" name="password" placeholder="Password" alt="password" required="required"/><br/><br/>
            <input type="submit" name="submit" value="Submit!!!" alt="submit"/>
        </form><br/>
        <h4>Copyright kelompok 1 &copy; <font color="red"></font></h4>
    </div>
</body>
</html>
<?php
}
?>
