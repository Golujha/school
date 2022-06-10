<?php include "dbConfig.php";

if(!isset($_SESSION['admin'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php";?>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-3 col-12">
                <?php include "side.php";?>           
            </div>

            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-8"><h5>Manage Students</h5></div>
                    <div class="col-4">
                        <form action="" class="d-flex">
                            <input type="search" name="search" class="form-control">
                            <input type="submit" name="find" class="btn btn-danger" value="Find">
                        </form>
                    </div>
                </div>
                <table class="table table-bordered border-danger border-9 mt-2">
                    <thead>
                        <tr>
                            <th scope="col" class="fw-bold text-center">id</th>
                            <th scope="col" class="fw-bold text-center">Name</th>
                            <th scope="col" class="fw-bold text-center">contact</th>
                            <th scope="col" class="fw-bold text-center">email</th>
                            
                            <th scope="col" class="fw-bold text-center">action</th>
                        </tr>
                    </thead>
                   <?php 
                    if(isset($_GET['find'])){
                            $search= $_GET['search'];
                            $callingStudent = mysqli_query($connect, "select * from students where id='$search' OR name LIKE '%$search%' OR contact='$search' OR email='$search'");
                    }
                    else{
                        $callingStudent = mysqli_query($connect, "select * from students");
                    }
                    
                   while($row=  mysqli_fetch_array($callingStudent)){

                    ?>

                        <tr>
                            <td class="fw-bold text-center"><?php echo $row['id'];?></td>
                            <td class="fw-bold text-center"><?php echo $row['name'];?></td>
                            <td class="fw-bold text-center"><?php echo $row['contact'];?></td>
                            <td class="fw-bold text-center"><?php echo $row['email'];?></td>
                            <td>
                                <a href="manageStudents.php?del=<?php echo $row['id'];?>" class="btn btn-danger d-inline-block" style="margin-left:30px"><i class='bi bi-trash'>delete</a>
                                <a href="" class="btn btn-success d-inline-block" style="margin-left:30px">edit</a>
                                <a href="" class="btn btn-info d-inline-block" style="margin-left:30px">view</a>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php 
if(isset($_GET['del'])){
    $id = $_GET['del'];

    $query = mysqli_query($connect,"delete from students where id='$id'");
    if($query){
        echo "<script>window.open('manageStudents.php','_self')</script>";

    }
    else{
        echo "<script>alert('delete fail! try again')</script>";

    }
}