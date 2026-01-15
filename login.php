<?php
include('./Mahasiswa/db_connection.php');

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }
    
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>

<body>
    <div>
        <div style="margin: auto; border: 1px black solid; border-radius: 6px; max-width: 25%; background-color: #20252e;">
            <form action="" method="post">
                <h2 style="text-align: center; color:white;">Login</h2>

                <div style="display: flex; flex-direction: column; gap: 12px; margin-left: 12px;">
                    <label for="username" style="color: white;">Nama Anda</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan Nama Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">

                    <label for="password" style="color: white;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">

                    <button type="submit" name="login" style="max-width: 50%; margin-left: 25%; margin-bottom: 5%; border-radius: 6px; height: 40px; background-color: #9fe88d;">Login</button>

                    <p style="color: white;">Don't have an account? <a href="register.php" style="text-decoration: none; color: #00d0ef;">Sign Up</a></p>
                    <?php if (isset($error)) : ?>
                        <p style="color: red; font-style: italic;">Username / Password salah</p>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>


</body>

</html>