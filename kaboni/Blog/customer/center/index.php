<?php
session_start();
include 'connection.php';
$id = 100; //for Session id

if(!isset($id))
{
    header('Location:login.php');
    echo "<script>console.log('Your not log in..!')</>"; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation </title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- calender css -->
    <link href="css/calendarorganizer.min.css" rel="stylesheet">
    <style>
         * {
                box-sizing: border-box;
            }
    </style>
</head>
<body>
    <!-- navbar -->  
 <nav class="navbar navbar-expand-lg fixed-top ">  
    <a class="navbar-brand" href="../index.php">KABONI.lk</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse " id="navbarSupportedContent">     <ul class="navbar-nav mr-4">
    <li class="nav-item">
        <a class="nav-link" data-value="about" href="#" data-toggle='modal' data-target='#myModal'>Add</a>
    </li>  
   <li class="nav-item">
       <a class="nav-link " data-value="portfolio" href="#" data-toggle='modal' data-target='#retModal'>View My</a>    
    </li>
	<li class="nav-item">
       <a class="nav-link " data-value="portfolio" href="#" data-toggle='modal' data-target='#retModal'>Back</a>    
    </li> 
   </ul> 
   </div></nav>
   <!-- header -->
   <header class="header">
        <div class="overlay"></div>
        <div class="container">
            <!-- calender -->
            <div class="calendar">
                <div class ="column "id="calendarContainer"></div>
                <div class="column" id="organizerContainer"></div>
                    <script src="js/calendarorganizer.min.js"></script>
                    <script>
                        "use strict";

                        // function that creates dummy data for demonstration
                        function createDummyData() {
                            var date = new Date();
                            var data = {};

                                for (var i = 0; i < 10; i++) {
                                        data[date.getFullYear() + i] = {};

                                        for (var j = 0; j < 12; j++) {
                                            data[date.getFullYear() + i][j + 1] = {};

                                            for (var k = 0; k < Math.ceil(Math.random() * 10); k++) {
                                                var l = Math.ceil(Math.random() * 28);

                                                try {
                                                    data[date.getFullYear() + i][j + 1][l].push({
                                                        startTime: "10:00",
                                                        endTime: "12:00",
                                                        text: "Some Event Here"
                                                    });
                                                } catch (e) {
                                                    data[date.getFullYear() + i][j + 1][l] = [];
                                                    data[date.getFullYear() + i][j + 1][l].push({
                                                        startTime: "10:00",
                                                        endTime: "12:00",
                                                        text: "Some Event Here"
                                                    });
                                                }
                                            }
                                        }
                                    }
                            return data;
                        }

                        // creating the dummy static data
                        var data = createDummyData();

                        // initializing a new calendar object, that will use an html container to create itself
                        var calendar = new Calendar("calendarContainer", // id of html container for calendar
                            "medium", // size of calendar, can be small | medium | large
                            [
                                "Monday", // left most day of calendar labels
                                3 // maximum length of the calendar labels
                            ], [
                                "#ffc107", // primary color
                                "#ffa000", // primary dark color
                                "#ffffff", // text color
                                "#ffecb3" // text dark color
                            ],
                            {
                                // placeholder: "" // Removes Organizer's Placeholder
                                placeholder: "<button style='width: calc(80% - 10px); background-color: #E6E6E6; border-radius: 6px; margin-left: 60px;margin-top:8px; border: none; padding: 12px 0px; cursor: pointer;' data-toggle='modal' data-target='#myModal'>Add New Appointment</button>",
                                indicator: true,
                                indicator_type: 0, // indicator type, can be 0 (not numeric) | 1 (numeric)
                                indicator_pos: "top" // indicator position, can be top | bottom
                            }
                        );

                        // initializing a new organizer object, that will use an html container to create itself
                        var organizer = new Organizer("organizerContainer", // id of html container for calendar
                            calendar, // defining the calendar that the organizer is related to
                            data // giving the organizer the static data that should be displayed
                        );
                        
                    </script>
                </div>
            </div>
        </div>

        <!-- form Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header" style="outline-offset: -13px;
                                                padding: 40px;
                                                background: #6819e8;
                                                background: -moz-linear-gradient(left, #6819e8 0%, #7437d0 35%, #615fde 68%, #6980f2 100%);
                                                background: -webkit-linear-gradient(left, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                background: linear-gradient(to right, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );
                ">
                <h4 class="modal-title" style="color: #FFFFFF;">Appointment</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-top: -55px;margin-right: -50px;">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                        <form action="datahandler.php" method = "post" class="needs-validation" novalidate>
                            <div class="form-group">
                              <label for="name">Your Name:</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required='true'>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                              <label for="contact">Contact No:</label>
                              <input type="text" class="form-control" id="contact" placeholder="Enter contact no." name="contact" required='true'>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="email">E Mail:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <!-- <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div> -->
                            </div>
                            <div class="form-group">
                                <label for="date">Appoinment Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required='true'>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="time" class="form-control" id="time" name="time" required='true'>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <input type="submit" name = "submit" class="btn btn-primary" value="submit">
                          </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            </div>
        </div>

        <!-- msg modal toggel button                 -->
        <button id='msgbtn' data-toggle="modal" data-target="#msgModal" style="display:none;">Open modal</button>
        <!-- message modal -->
        <div class="modal fade" id="msgModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header" style="outline-offset: -13px;
                                                padding: 30px;
                                                background: #39e600;
                                                background: -moz-linear-gradient(left, #39e600 0%, #66ff33 35%, #8cff66 68%, #b3ff99 100%);
                                                background: -webkit-linear-gradient(left, #39e600 0%,#66ff33 35%,#8cff66 68%,#b3ff99 100%);
                                                background: linear-gradient(to right, #39e600 0%,#66ff33 35%,#8cff66 68%,#b3ff99 100%);
                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#39e600', endColorstr='#b3ff99',GradientType=1 );
                ">
                    <h4 class="modal-title" style="color: #FFFFFF;">you have a message.</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -45px;margin-right: -40px;">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <h6 style='text-align:center;font-size:2em;'><?php $msg = $_SESSION['msg']; echo $msg; unset($_SESSION['msg']);?></h6>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- retrive modal -->
        <div class="modal fade" id="retModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header" style="outline-offset: -13px;
                                                padding: 30px;
                                                background: #6819e8;
                                                background: -moz-linear-gradient(left, #6819e8 0%, #7437d0 35%, #615fde 68%, #6980f2 100%);
                                                background: -webkit-linear-gradient(left, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                background: linear-gradient(to right, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );
                ">
                    <h4 class="modal-title" style="color: #FFFFFF;">Your Appointment.</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -45px;margin-right: -40px;">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <?php
                        $query = "SELECT * FROM appoinment_data WHERE id = $id";
                        $result = mysqli_query($con,$query);
                    
                        echo "<table class='table table-striped'>
                        <tr>
                        <th>Name</th>
                        <th>Date and Time</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>";
                    
                        if($result){
                            while($row = mysqli_fetch_array($result))
                            {
                                $datetime = $row['datetime'];
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['datetime'] . "</td>";
                                echo "<td><form action='update.php' method='post'><input type='text' name='datetime' style='display:none' value='$datetime'><input type='submit' name='update' class = 'btn btn-primary' value='Update'></form></td>";
                                echo "<td><form action='datahandler.php' method='post'><input type='text' name='datetime' style='display:none' value='$datetime'><input type='submit' name='delete' class = 'btn btn-danger' value='Delete'></form></td>";
                                echo "</tr>";
                            }
                            echo '<script>console.log("Data retrieve success..")</script>';
                        }
                        else
                        {
                            echo "<tr>";
                            echo "<td>Nothing to Show</td>";
                            echo "</tr>";
                            echo '<script>console.log("Data retrieve Error..")</script>';

                        }
                        echo "</table>";
                    
                        
                    
                        mysqli_close($con);
                        ?>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- confirm modal -->
        <div class="modal fade" id="msgModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header" style="outline-offset: -13px;
                                                padding: 30px;
                                                background: #6819e8;
                                                background: -moz-linear-gradient(left, #6819e8 0%, #7437d0 35%, #615fde 68%, #6980f2 100%);
                                                background: -webkit-linear-gradient(left, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                background: linear-gradient(to right, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );
                ">
                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -50px;margin-right: -45px;">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <h6>Do you wnat to remove this appoinment?</h6>
                    <form action="datahandler.php" method="post">
                        <input type="button" value="remove">
                    </form>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    
    <!-- jquery,popper js,bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <!-- open msg modal -->
    <?php if(isset($_SESSION['modelflag'])){ ?>
    <script>
        document.getElementById('msgbtn').click();    
    </script>
    <?php }  unset($_SESSION['modelflag']);?>
</body>
</html>