<?php
    include('./Mahasiswa/db_connection.php');
    
    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
        $password2 = password_hash($_POST["password2"], PASSWORD_DEFAULT); 
        $no_telpon = $_POST["nomor"];
        
        $password_raw = $_POST["password"];
        $password_raw2 = $_POST["password2"];
        
        
        if( $password_raw !== $password_raw2 ){
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                </script>";
            return false;
        }
        
         $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username' ");
        
        if( mysqli_fetch_array($result) ){
            echo"<script>
                    alert('username sudah terdaftar!');
                </script>";
            return false;
        }
        
        $query = mysqli_query($koneksi, "INSERT INTO user (username,password,no_telpon) 
            VALUES ('$username', '$password', '$no_telpon')"); 
        
        if($query ){
            echo "<script>
                    alert('user baru berhasil ditambahkan!');
                </script>";
        } else {
            echo mysqli_error($koneksi);
        }
        
        return mysqli_affected_rows($koneksi);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div style="color: #00d0ef;">
        <div style="margin: auto; border: 1px black solid; border-radius: 6px; max-width: 25%; background-color: #20252e;">
            <form action="" method="post">
                <h2 style="text-align: center; color:white;">Register</h2>
                
                <div style="display: flex; flex-direction: column; gap: 12px; margin-left: 12px;">
                    <label for="username" style="color: white;">Nama Anda</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan Nama Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <label for="password" style="color: white;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <label for="password2" style="color: white;">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <label for="nomor" style="color: white;">No.HP</label>
                    <input type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor HP Anda" style="height: 32px; margin-bottom: 12px; max-width: 95%; border-radius: 6px;">
                    
                    <button type="submit" name="register" style="max-width: 50%; margin-left: 25%; margin-bottom: 5%; border-radius: 6px; height: 40px; background-color: #9fe88d;" >Register</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>