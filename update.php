<?php 
include 'connect.php';
$message = '';
$messageType = '';

$id=$_GET['upid'];
$sql="select * from `operations` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $sql="update `operations` set id=$id,name='$name',email='$email',phone='$phone'  where id=$id";
    $result=mysqli_query($con,$sql);
    if ($result) {
        $message = "Data Updated successfully";
        $messageType = "success";
        
    } 
    else {
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
    <title>user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script type="text/javascript" src="update.js"></script>
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
    <nav class="navbar navbar-dark  justify-content-center bg-dark ">
        <span class="navbar-brand mb-0 h1">USER UPDATE</span>
    </nav>
    <br><br>
    <div class="container">
        <form method="post" id="formval">
            <div class="form-group">
              <label class="required">NAME</label>
              <input type="text" class="form-control" placeholder="Enter name" name="name" autocomplete="off" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label class="required">EMAIL</label>
                <input type="EMAIL" class="form-control" placeholder="Enter email" name="email" autocomplete="off" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
                <label class="required">MOBILE</label>
                <input type="text" class="form-control" placeholder="Enter phno" name="phone" autocomplete="off" value="<?php echo $phone;?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
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