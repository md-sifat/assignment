<?php
    include 'connect_db.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Engine</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
</head>
<body>
    
    <form action="output.php" method="POST">
        <div>
            <tr>
                <td> <input type="text" name="Search_Name"  placeholder="Search" ></td>
                <td>
                <select class="select">
                    <option>Search By Name</option>
                    <option>Search By Phone_Number</option>
                    <option>Search By Address</option> 
                </select>
                </td>
            </tr>
                
        </div>
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
        
    </form>
   
    
</body>
</html>