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

    <div class="row">
        <div class="text-center"><h2>Color Details</h2></div>
    </div>
    <br/>
    <div class="row">

            <div class="rows">
                <div class="form-group">
                    <label class="control-lebal col-sm-2 col-sm-offset-4">Color Name: </label>
                    <div class="col-sm-4">
                        <?php
                        foreach($p->result() as $row)
                        {
                            $cid=$row->cid;
                            $cname=$row->cname;
                            ?><input type="hidden" id="cid" name="cid" value="<?php echo $row->cid ?>" <label class="control-label col-sm-4"><?php echo $row->cname?></label>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br/><br/><br/>
            <!--Show Color Details-->
            <div class="text-center result col-sm-4 col-sm-offset-2">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Person Names for <?php echo $cname;?></th>
                        <th class="text-center">Click to Delete</th>
                    </tr>
                    </thead>
                    <tbody id="color">
                    <?php
                    foreach ($p1->result() as $row)
                    {
                        ?><tr>
                        <td><?php echo $row->pname?></td>
                        <!--<td><a href="http://localhost/codeignitor/personcolor/delete_color/<?php echo $row->id?>/<?php echo $row->cid?>">Delete</a></td>-->
                        <td><form action="http://localhost/codeignitor/personcolor/delete_color" method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo $row->id ?>">
                            <input type="hidden" id="cid" name="cid" value="<?php echo $row->cid?>">
                            <button class="btn btn-primary btn-sm" type="submit" id="delete" name="delete">Delete</button>
                        </form></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center result col-sm-4">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center" colspan="2">All Relationships</th>
                    </tr>
                    <tr class="text-center">
                        <th class="text-center">Name</th>
                        <th class="text-center">Color</th>
                    </tr>
                    </thead>
                    <tbody id="color">
                    <?php
                    foreach ($p2->result() as $row)
                    {
                        ?><tr>
                        <td><?php echo $row->pname?></td>
                        <td><?php echo $row->cname?></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>


    </div>
    <div class="row col-sm-3 col-sm-offset-5">
        <div class="form-group">
            <label for="person"">Select Person to Add: </label>
            <form id="formPerson">
                <input type="hidden" id="cid1" name="cid1">
                <select class="form-control" id="person" name="person">
                    <?php
                    foreach ($p3->result() as $row)
                    {
                        ?>
                        <option value="<?php echo $row->pid ?>"><?php echo $row->pname?></option>
                    <?php }
                    ?>
                </select>
            </form>
        </div>
    </div>
    <div class="row col-sm-3 col-sm-offset-6">
        <button type="button" class="submit btn btn-primary btn-sm">Insert Person</button>
    </div>

</div>
<script type="text/javascript">
    var data;
    $(document).ready(function() {
        $(".submit").click(function() {
            var cid = $("#cid").val();
            $("#cid1").val(cid);
            var formData = $('#formPerson').serialize();
            console.log(formData);
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/codeignitor/Personcolor/addPersonToColor",
                dataType: 'json',
                data: $('#formPerson').serialize(),
                success: function(res) {
                    if (res)
                    {
                        $('body').html(res);
                        //console.log(res);
                    }
                }
            });
        });
    });
</script>
</body>
</html>