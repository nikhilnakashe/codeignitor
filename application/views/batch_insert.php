<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Welcome to CodeIgniter</title>


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
    <form class="form-horizontal" id="studentForm" action="http://localhost/codeignitor/batchinsert" method="post" class="text-center">
        <input type="hidden" id="countervalue" name="countervalue" value="1"/>
        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student ID:</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="sid" name="sid[]" placeholder="Enter Student ID">
                </div>
            </div>
        </div>

        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="sname" name="sname[]" placeholder="Enter Student Name">
                </div>
            </div>
        </div>


        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Class:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="sclass" name="sclass[]" placeholder="Enter Student Class">
                </div>
            </div>
        </div>

        <div id='TextBoxesGroup' class="rows">
            <div id='TextBoxDiv1' class="form-group">

            </div>
        </div>

        <button type="button" class="addstudent btn btn-primary btn-sm col-sm-2 col-sm-offset-3">
            <span class="glyphicon glyphicon-plus"></span> Add More Records
        </button>
        <br/>

        <?php if (isset($message)) { ?>
            <h3 class="text-center">Data inserted successfully</h3><br>
        <?php } ?>
        </br></br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-sm">Insert Details</button>
            &nbsp;&nbsp;
            <button type="reset" class="btn btn-default btn-sm">Reset</button>
            <br/><br/>
            <button type="button" class="submit1 btn btn-primary btn-sm">Insert Details AJAX</button>
            <div id="demosample"></div>
        </div>
        <br/><br/><br/>

        <div class="text-center result">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show Student Details</button>
            <br/><br/>
            <div id="resultdisplay">
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
                            <td><a href='http://localhost/codeignitor/batchinsert/delete/<?php echo $row->sid;?>'>Delete</a></td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                    <input type="button" class="add-row btn btn-primary" value="Add Row">
                </div>
            </div>
        </div>

    </form>
    <input type="hidden" id="countervalue" name="countervalue" value="0"/>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

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

    /*$(document).ready(function(){
     $(".submit1").click(function(){
     var sid = $("#sid").val();
     var sname = $("#sname").val();
     var sclass = $("#sclass").val();

     jQuery.ajax({
     type: "POST",
     url: "http://localhost/batchinsert/" + "Welcome/data_submit",
     dataType: 'json',
     data: {sid: sid,sname: sname,sclass: sclass},
     success: function(res) {
     if (res)
     {
     var rowdata = "<tr><td>"+res.sid+"</td><td>"+res.sname+"</td><td>"+res.class+"</td><td><a href='http://localhost/batchinsert/welcome/delete/"+res.sid+"'>Delete</a></td></tr>";
     //$("div#demosample").html(rowdata);
     $("table tbody").append(rowdata);
     }
     }
     });
     });
     });*/


    //Counter Code
    /*$(document).ready(function(){
     $('#demosample').data('count', 0);
     $('.addstudent').click(function(){
     $('#demosample').html(function(){
     var $this = $(this),
     count = $this.data('count') + 1;

     $this.data('count', count);
     return count;
     });
     });
     });*/

    var counter = 1;

    $(document).ready(function() {
        $(".addstudent").click(function () {
            if (counter > 10) {
                alert("Only 10 Records Allowed");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);

            newTextBoxDiv.after().html('<hr><label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student ID ' + counter + ' : </label>' +
                '<div class="col-sm-4"><input type="text" class="form-control" name="sid[]" id="sid' + counter + '" placeholder="Enter Student ID" ></div><br/><br/><br/> <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Name ' + counter + ' : </label>' +
                '<div class="col-sm-4"><input type="text" class="form-control" name="sname[]" id="sname' + counter + '" placeholder="Enter Student Name" ></div><br/><br/><br/> <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Student Class ' + counter + ' : </label>' +
                '<div class="col-sm-4"><input type="text" class="form-control" name="sclass[]" id="sclass' + counter + '" placeholder="Enter Student Class" ></div><br/><br/><br/>');

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
            $('#countervalue').val(counter);
        });


    });

    $(document).ready(function(){
        $(".submit1").click(function(){

            var studentForm=$("#studentForm").serialize();

            /*var data="{";

             $.each(studentForm, function(i, field){
             data=data+field.name+": \""+field.value+"\",";
             });

             var newdata=data.substring(0,data.length-1);


             newdata=newdata+"}";*/

            console.log(studentForm);

            jQuery.ajax({
                type: "POST",
                url: "http://localhost/codeignitor/" + "Batchinsert/batch_insert",
                dataType: 'json',
                data: $("#studentForm").serialize(),
                success: function(res) {
                    console.log(res);
                    if (res)
                    {
                        jQuery.each( res, function( i, val ) {
                            var rowdata = "<tr><td>"+val.sid+"</td><td>"+val.sname+"</td><td>"+val.class+"</td><td><a href='http://localhost/codeignitor/batchinsert/delete/"+val.sid+"'>Delete</a></td></tr>";
                            //$("div#demosample").html(rowdata);
                            $("table tbody").append(rowdata);
                        });
                    }
                }
            });
        });

    });

</script>
</html>