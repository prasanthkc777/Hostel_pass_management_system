<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>outpass</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->




    <!-- outpass -->
    <?php
    $sql_select = "SELECT * FROM $username WHERE status=1";
          $ret = mysqli_query($link,$sql_select);
          $main = mysqli_fetch_array($ret);
          ?>

        <div class="container" style="margin-top: 52px;">
    
            <div class="card z-depth-5 mb-3" style="background-color: #f0f0f0;">
           
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="sampleqr.jpg"
                            style="margin-left:30px; margin-top:100px; padding: 5px; width:  200px; height: 200px;"
                            alt="profile" class="responsive-img center ">
                            <p class="text-muted center" style="padding-right:50px;">Scan For More Info</p>
                    </div>
                   


                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>OutPass</strong></h5>
                            <div class="dropdown-divider "></div>
                             <img src="bg.jpg"
                                style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><em><strong>Student Name   </strong></em>
                            <p class="card-text"><u> application_number </u>  <div class="dropdown-divider "></div></p>
                            <p class="card-text"><u> department </u>  <div class="dropdown-divider "></div></p>
                            <p class="card-text"><u> year / </u> &nbsp;
                                <u> section </u>  <div class="dropdown-divider "></div>
                            </p>
                            
                            <p><em><strong>This outpass is valid from<u> out date_time </u> to <u> in
                                                        date_time </u></strong></em></p>

                        </div>
                        
                        <div class="card-action right-align">
                        <strong>Officially verified by Class incharge, HOD and Hostel warden</strong> &nbsp; &nbsp;
                                <a href="#" ><i class="fa fa-download small "></i></a>
                            </div>

                    </div>
                </div>
            </div>

        </div>



</body>

</html>