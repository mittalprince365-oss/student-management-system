<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Dashboard</title>

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
            padding: 40px;
        }

        .container{
            max-width: 1100px;
            margin: auto;
        }

        .header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1{
            color: white;
            font-size: 32px;
        }

        .add-btn{
            text-decoration: none;
            background: white;
            color: #667eea;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .add-btn:hover{
            background: #f2f2f2;
            transform: translateY(-2px);
        }

        .table-box{
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow-x: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th{
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td{
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover{
            background: #f8f9ff;
        }

        .action-btn{
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .action-btn:hover{
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="header">
            <h1>Student Management System</h1>
            <a href="addstudent.php" class="add-btn">+ Add Student</a>
        </div>

        <div class="table-box">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>

                <?php
                include 'db.php';
                $q= "select * from student";
                $run= mysqli_query($conn,$q);

                while($row= mysqli_fetch_array($run)){
                    echo "<tr>";
                    echo "<td>".$row['uid']."</td>";
                    echo "<td>".$row['uname']."</td>";
                    echo "<td>".$row['uemail']."</td>";
                    echo "<td>".$row['uphoneno']."</td>";
                    echo "<td>".$row['udate']."</td>";
                    echo "<td><a href=' edit.php ? id=".$row['uid']."' class='action-btn'>Edit / Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

    </div>

</body>
</html>