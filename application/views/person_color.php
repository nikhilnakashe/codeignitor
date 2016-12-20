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
    <title>Person Color Relationship Demo</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>

<div class="container">

    <div class="rows">
        <div class="text-center"><h2>Insert your details here</h2></div>
    </div>
    <br/>
    <form class="form-horizontal" action="http://localhost/codeignitor/personcolor" method="post" class="text-center">
        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Person's Color: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Color Name">
                </div>
            </div>
        </div>


        <div class="rows">
            <div class="form-group">
                <label class="control-lebal col-sm-2 col-sm-offset-3">Enter Persons Name: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter Person Name">
                </div>
            </div>
        </div>


        </br></br>
        <div class="text-center">
            <button type="button" class="submit btn btn-primary btn-sm">Insert Details</button>
            &nbsp;&nbsp;
            <button type="reset" class="btn btn-default btn-sm">Reset</button>
        </div>
        <br/><br/><br/><br/>
        <!--Show Color Details-->
        <div class="text-center result col-sm-2 col-sm-offset-2">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Color Name</th>
                    </tr>
                    </thead>
                    <tbody id="color">
                    <?php
                    foreach ($h->result() as $row)
                    {
                        ?><tr>
                        <td><a id="colorname" name="colorname" href='http://localhost/codeignitor/personcolor/viewload_color/<?php echo $row->cid;?>'><?php echo $row->cname; ?></a></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
        </div>
        <!--Show Name Details-->
        <div class="text-center result col-sm-2 col-sm-offset-4">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Person Name</th>
                    </tr>
                    </thead>
                    <tbody id="person">
                    <?php
                    foreach ($h->result() as $row)
                    {
                        ?><tr>
                        <td><a id="personname" name="personname" href='http://localhost/codeignitor/personcolor/viewload_person/<?php echo $row->pid;?>'><?php echo $row->pname; ?></a></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
        </div>

    </form>
</div>
<script type="text/javascript">
    var rowdata;
    var rowdata2;
    $(document).ready(function() {
        $(".submit").click(function() {
            var cname = $("#cname").val();
            var pname = $("#pname").val();
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/codeignitor/" + "personcolor/data_submit",
                dataType: 'json',
                data: {cname: cname, pname: pname},
                success: function(res) {
                    if (res)
                    {
                        console.log(res);
                        jQuery.each( res, function( i, val ) {
                            rowdata = "<tr><td><a href='http://localhost/codeignitor/personcolor/viewload_color/"+val.cid+"'>"+val.cname+"</a></td></tr>";
                            rowdata2= "<tr><td><a href='http://localhost/codeignitor/personcolor/viewload_person/"+val.pid+"'>"+val.pname+"</a></td></tr>";
                            //$("div#demosample").html(rowdata);
                        });
                        $("tbody#color").append(rowdata);
                        $("tbody#person").append(rowdata2);
                    }
                }
            });
        });
    });
</script>
</body>
</html>