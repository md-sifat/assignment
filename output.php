<?php
    include 'connect_db.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone_No </th>
                <th>Address </th>
            </tr> 
        </thead>
    <?php
    $flag = 1;

            if(isset($_POST['submit']) || (isset($_GET['get']))){
                
                $name = '';
                $phone = '';
                $address = '';
                
                if(isset($_POST['submit'])){
                    $name=$_POST['Search_Name'];
                }else if(isset($_GET['Name'])){
                    $name=$_GET['Name'];
                }
                
                if(isset($_POST['submit'])){
                    $name=$_POST['Search_Name'];
                }
                else if(isset($_GET['Phone_No'])){
                    $phone=$_GET['Phone_No'];
                }

                if(isset($_POST['submit'])){
                    $name=$_POST['Search_Name'];
                }
                else if(isset($_GET['Address'])){
                    $address=$_GET['Address'];
                }

                
                // echo $name;
                // $query=mysqli_query($conn,"select * from assignment where Name='$name' or Phone_No='$name' or Address='$name' ");
                if(isset($_GET['get'])){
                    $query= "SELECT * FROM `assignment` where Name='$name' or Phone_No='$phone' or Address='$address' ";
                }else if(isset($_POST['submit'])){
                    $query= "SELECT * FROM `assignment` where Name='$name' or Phone_No='$name' or Address='$name' ";
                }
                
                $query_run=mysqli_query($conn,$query);
                $num_rows=mysqli_num_rows($query_run);
                // echo $num_rows;
              
                
                if($num_rows > 1){
                    $flag = 2;
                    echo "There are ",$num_rows," matching data. To show all data click here!!";
                    echo '<button id="btn" >Click Here</button>';
                    echo '<br><br><br>';
                    echo 'Want to search with more data??';
                    echo '<button id="search_more" >Search More</button>';
                }

                
                
                while($row=mysqli_fetch_array($query_run)){
                 

                    ?>
                        
                    
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Phone_No']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                        </tr>
                    <?php
                
                            }
                         
                }
                        
                    
                    ?>   
    </table>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" id="myform">
        <input type="text" name="Name" placeholder="search by name" value="<?php echo (isset($_GET['Name'])) ? $_GET['Name'] : ''; ?>" id="name">
        <input type="text" name="Phone_No" placeholder="search by phone" value="<?php echo (isset($_GET['Phone_No'])) ? $_GET['Phone_No'] : ''; ?>" id="phone_no">
        <input type="text" name="Address" placeholder="search by address" value="<?php echo (isset($_GET['Address'])) ? $_GET['Address'] : ''; ?>" id="address">
        <input type="hidden" name="get" value="1">
    </form>
    </div>

    <style>
        table{
            display: <?php echo ($flag === 2) ? 'none' : 'block' ?>;
        }
        #myform{
            display: none;
        }
    </style>

<script>
    $(document).ready(function(){

        $("#btn").on('click',function(){
            $('table').css({'display': 'block'})
        });

         $("#search_more").on('click',function(){
            $('#myform').css({'display': 'block'})
        });

        $("#name").on('change',function(){
            $("#myform").submit();
        });
        $("#phone_no").on('change',function(){
            $("#myform").submit();
        });
        $("#address").on('change',function(){
            $("#myform").submit();
        });

    });
</script>

</body>
</html>
