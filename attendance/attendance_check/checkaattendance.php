<?php
include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include '../../css/style.css';
        ?>
        header{
            position: fixed;
            top: 0;
        }
        .center_div{
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(rgba(7, 9, 10, 0.63), rgba(6, 9, 10, 0.562)), url('../../img/school.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            display: grid;
            place-items: center;
        }

        .PRESENT{
            color:green;
            text-decoration:underline;
            font-weight:600;
        }

        .ABSENT{
            color:red;
            text-decoration:underline;
            font-weight:600;
        }
    </style>
    <script src="https://kit.fontawesome.com/40bc81af5c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>8E Attendance Register</header>
    <div class="center_div">
        <div class="main_div">
            <div class="details">Student Details</div>
            <form action="" method="POST">
                <input type="date" name="date" required>
                <button name="check_attendance">CHECK</button>
                <br>
                <a href="../attendance.php">Maintain Attendance</a>
            </form>
        </div>
    </div>
    <div class="studentslist">
        <table border="1">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_POST['check_attendance'])){
                    $date = $_POST['date'];
                    $selectquery = " SELECT * FROM attendance_register WHERE date='$date' ";
                    $query = mysqli_query($con,$selectquery);
                    while($res = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $res['name']; ?></td>
                            <td class="<?php echo $res['status']; ?>"><?php echo $res['status']; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>