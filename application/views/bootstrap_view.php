<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Welcome to CodeIgniter</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>

<div class="container">
    <div class="rows">
        <div class="well">
            <h3>
                Student Database
            </h3>
        </div>
    </div>

    <?php if (isset($message)) { ?>
        <h3 class="text-center">Data inserted successfully</h3><br>
    <?php } ?>
    <div class="rows">
        <div class="text-center"><h2>Insert your Student Details here</h2></div>
    </div>
    <br/>
    <form class="form-horizontal" action="http://localhost/codeignitor/bootstrap" method="post" class="text-center">
        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student ID:</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="sid" name="sid" placeholder="Enter Student ID">
                </div>
            </div>
        </div>

        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Student Name">
                </div>
            </div>
        </div>


        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Class:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="sclass" name="sclass" placeholder="Enter Student Class">
                </div>
            </div>
        </div>


        <?php if (isset($message)) { ?>
            <h3 class="text-center">Data inserted successfully</h3><br>
        <?php } ?>
        </br></br>
        <div class="text-center">
            <button type="submit" class="submit btn btn-primary btn-sm">Insert Details</button>
            &nbsp;&nbsp;
            <button type="reset" class="btn btn-default btn-sm">Reset</button>
        </div>
        <br/><br/><br/>

        <div class="text-center result">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show Student Details</button>
            <br/><br/>
            <div id="demo" class="collapse">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Student ID</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Student Class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($h->result() as $row)
                    {
                        ?><tr>
                        <td><?php echo $row->sid;?></td>
                        <td><?php echo $row->sname;?></td>
                        <td><?php echo $row->class;?></td>
                        <td><a href='http://localhost/codeignitor/bootstrap/delete/<?php echo $row->sid;?>'>Delete</a></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
                <input type="button" class="add-row btn btn-primary" value="Add Row">
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var sid = $("#sid").val();
            var sname = $("#sname").val();
            var sclass = $("#sclass").val();
            var addrow = "<tr><td>" + sid + "</td><td>" + sname + "</td><td>" + sclass + "</td></tr>";
            $("table tbody").append(addrow);
        });
    });


    $(document).ready(function() {
        $(".submit").click(function() {
            var sid = $("#sid").val();
            var sname = $("#sname").val();
            var sclass = $("#sclass").val();
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/codeignitor/" + "bootstrap/user_data_submit",
                dataType: 'json',
                data: {sid: sid, sname: sname, sclass: sclass},
                success: function(res) {
                    if (res)
                    {

                    }
                }
            });
        });
    });
</script>
</body>
</html>