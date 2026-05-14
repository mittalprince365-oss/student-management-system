<?php
include 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$q = "select * from student where uid = $id";
$run = mysqli_query($conn, $q);
$row = mysqli_fetch_array($run);

if(isset($_POST["update"])){
    $name = $_POST["uname"];
    $mob = $_POST["uphoneno"];
    $email = $_POST["uemail"];

    $d = "update student set uname='$name', uphoneno='$mob', uemail='$email' where uid='$id'";
    $c = mysqli_query($conn, $d);

    if($c){
        echo "<div class='message success'>Student updated successfully</div>";
    } else {
        echo "<div class='message error'>Update failed</div>";
    }
}

if(isset($_POST["delete"])){
    $a = $_GET['id'];
    $b = "delete from student where uid=$a";

    if(mysqli_query($conn, $b)){
        header("location: main.php");
        exit();
    } else {
        echo "<div class='message error'>Unable to delete student</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            min-height: 100vh;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .container{
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .form-box{
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .form-box h1{
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 28px;
        }

        .input-group{
            margin-bottom: 18px;
        }

        .input-group label{
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        .input-group input{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-group input:focus{
            outline: none;
            border-color: #4facfe;
            box-shadow: 0 0 8px rgba(79,172,254,0.3);
        }

        .btn-group{
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .update-btn,
        .delete-btn{
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            color: white;
            transition: 0.3s;
        }

        .update-btn{
            background: #28a745;
        }

        .update-btn:hover{
            background: #218838;
        }

        .delete-btn{
            background: #dc3545;
        }

        .delete-btn:hover{
            background: #c82333;
        }

        .message{
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            padding: 14px 25px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            animation: fadeIn 0.4s ease;
            z-index: 999;
        }

        .success{
            background: #d4edda;
            color: #155724;
            border-left: 6px solid #28a745;
        }

        .error{
            background: #f8d7da;
            color: #721c24;
            border-left: 6px solid #dc3545;
        }

        @keyframes fadeIn{
            from{
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
            to{
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-box">
            <h1>Update Student Data</h1>

            <form action="" method="POST">

                <div class="input-group">
                    <label>Update Student Name</label>
                    <input type="text" name="uname" value="<?php echo $row['uname']; ?>">
                </div>

                <div class="input-group">
                    <label>Update Student Mobile Number</label>
                    <input type="text" name="uphoneno" value="<?php echo $row['uphoneno']; ?>">
                </div>

                <div class="input-group">
                    <label>Update Email ID</label>
                    <input type="email" name="uemail" value="<?php echo $row['uemail']; ?>">
                </div>

                <div class="btn-group">
                    <input type="submit" name="update" value="Update" class="update-btn">
                    <input type="submit" name="delete" value="Delete" class="delete-btn">
                </div>

            </form>
        </div>
    </div>

</body>
</html>