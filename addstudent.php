<?php
include 'db.php';

if(isset($_POST["add_button"])){
    $a = $_POST["uid"];
    $b = $_POST["uname"];
    $c = $_POST["uemail"];
    $d = $_POST["uphoneno"];
    $e = $_POST["udate"];

    $q = "select * from student where uemail='$c'";
    $run = mysqli_query($conn, $q);

    if(mysqli_num_rows($run) > 0){
        echo "<div class='message warning'>Student already exists</div>";
    } else {
        $sql = "insert into student (uid,uname,uemail,uphoneno,udate) values ('$a','$b','$c','$d','$e')";

        if(mysqli_query($conn, $sql)){
            echo "<div class='message success'>Student added successfully</div>";
        } else {
            echo "<div class='message error'>Unable to insert student</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
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

        .form-box h2{
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-size: 30px;
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
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 8px rgba(102,126,234,0.3);
        }

        .submit-btn{
            width: 100%;
            padding: 14px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover{
            background: #5a67d8;
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

        .warning{
            background: #fff3cd;
            color: #856404;
            border-left: 6px solid #ffc107;
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
            <h2>Add Student</h2>

            <form action="" method="post">

                <div class="input-group">
                    <label>Enter ID</label>
                    <input type="number" name="uid" required>
                </div>

                <div class="input-group">
                    <label>Enter Name</label>
                    <input type="text" name="uname" required>
                </div>

                <div class="input-group">
                    <label>Enter Email</label>
                    <input type="email" name="uemail" required>
                </div>

                <div class="input-group">
                    <label>Enter Phone Number</label>
                    <input type="text" name="uphoneno" required>
                </div>

                <div class="input-group">
                    <label>Enter Registration Date</label>
                    <input type="date" name="udate" required>
                </div>

                <input type="submit" name="add_button" value="Add Student" class="submit-btn">

            </form>
        </div>
    </div>

</body>
</html>