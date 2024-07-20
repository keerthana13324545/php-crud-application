<?php 
include 'connect.php';
$message = '';
$messageType = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO `operations` (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $message = "Data inserted successfully";
        $messageType = "success";
    } else {
        $message = "Error: " . mysqli_error($con);
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<style>
        label.error{
        display:block;
        color:red;
        font-size:14px;
        font-weight:500px;
       }
        .required:after {
            content: "*";
            color: red;
            margin-left: 5px;
        }
    </style>
<body>
    <nav class="navbar navbar-dark justify-content-center bg-dark" style="background-color: #00ff5573;">
        <span class="navbar-brand mb-0 h1">USER INFORMATION</span>
    </nav>
    <br><br>
    <div class="container">
        <form id="formvalidation" method="post">
            <div class="form-group">
                <label class="required">NAME</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="required">EMAIL</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="required">MOBILE</label>
                <input type="text" class="form-control" placeholder="Enter phone" name="phone" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <?php if ($message): ?>
        <script>
            Swal.fire({
                icon: '<?php echo $messageType; ?>',
                title: '<?php echo $message; ?>'
            }).then(function() {
                <?php if ($messageType === 'success'): ?>
                    window.location.href = 'index.php';
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>
</body>
</html>
