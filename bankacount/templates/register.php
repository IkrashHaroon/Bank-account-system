<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f8f9fa;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

/* Container */
.container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 400px;
    max-width: 100%;
    text-align: center;
}

h1, h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-size: 16px;
    color: #555;
    text-align: left;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="number"] {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="number"]:focus {
    border-color: #5cb85c;
    outline: none;
}

input[type="submit"] {
    padding: 12px;
    background-color: #5cb85c;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}

/* Link Styles */
a {
    color: #5cb85c;
    text-decoration: none;
    font-size: 14px;
}

a:hover {
    text-decoration: underline;
}

/* Message Styles */
.message {
    margin-top: 20px;
    color: red;
    font-size: 14px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 14px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

/* Button Styles */
button {
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
    
</body>
</html>
<?php
session_start();
include_once '../config/db.php';
include_once '../src/User.php';

$message = '';

if($_POST){
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];

    $result = $user->register();

    if($result === true){
        $message = "User was registered successfully.";
    } else if ($result === "Username already exists.") {
        $message = "Username already exists. Please choose a different username.";
    } else {
        $message = "Unable to register the user.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<style>
    /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f2f5;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

/* Container */
.container {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 400px;
    max-width: 90%;
    text-align: center;
}

h1, h2 {
    color: #333;
    margin-bottom: 24px;
    font-size: 26px;
    font-weight: bold;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

label {
    font-size: 16px;
    color: #555;
    text-align: left;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="number"] {
    padding: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: #fafafa;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="number"]:focus {
    border-color: #007bff;
    background-color: #fff;
    outline: none;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
}

input[type="submit"] {
    padding: 14px;
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
    transform: scale(1.02);
}

/* Link Styles */
a {
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

a:hover {
    text-decoration: underline;
    color: #0056b3;
}

/* Message Styles */
.message {
    margin-top: 20px;
    color: red;
    font-size: 15px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 15px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 14px;
    text-align: left;
}

th {
    background-color: #f8f9fa;
    color: #333;
}

/* Button Styles */
button {
    padding: 12px 24px;
    background-color: #28a745;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #218838;
    transform: scale(1.05);
}

</style>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required><br>
            <input type="submit" value="Register">
        </form>
        <?php
        if($message != ''){
            echo "<p class='message'>$message</p>";
        }
        ?>
    </div>
</body>
</html>
