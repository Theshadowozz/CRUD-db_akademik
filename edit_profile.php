<?php
    include('./Mahasiswa/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <?php
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $_COOKIE[user] ");
    $data = mysqli_fetch_array($edit);
    ?>

    <div>
        <div style="margin: auto; border: 1px black solid; border-radius: 6px; max-width: 25%; background-color: #20252e;">
            <form action="" method="post">
                <h2 style="text-align: center; color:white;">Edit Profile</h2>
                
                <div style="display: flex; flex-direction: column; gap: 12px; margin-left: 12px;">
                    <label for="username" style="color: white;">Nama Anda</label>
                    <input type="text" name="username" id="username" value="<?php echo $data['username'] ?>" placeholder="Masukkan Nama Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <label for="password" style="color: white;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <label for="password2" style="color: white;">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <button type="submit" name="edit" style="max-width: 50%; margin-left: 25%; margin-bottom: 5%; border-radius: 6px; height: 40px; background-color: #9fe88d;" >Edit</button>
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['edit'])) {

        $update = mysqli_query($koneksi, "UPDATE user SET username = '$_POST[username] ', password = '$_POST[password]', email = '$_POST[email]' WHERE id = $_COOKIE[user]");

        if ($update) {
            echo "Terimakasih telah mengedit data user <br>";
            header("Location: index.php");
            exit;
        } else {
            echo "Proses edit data user gagal";
        }
    }
    ?>    
    
</body>

</html>