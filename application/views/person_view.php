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
<body id="body">

<div class="container">

    <div class="row">
        <div class="text-center"><h2>Person Details</h2></div>
    </div>
    <div class="row">

            <div class="rows">
                <div class="form-group">
                    <label class="control-lebal col-sm-2 col-sm-offset-4">Person Name: </label>
                    <div class="col-sm-4">
                        <?php
                        foreach($p->result() as $row)
                        {
                            $pname=$row->pname;
                            $pid=$row->pid;
                            ?><input type="hidden" id="pid" name="pid" value="<?php echo $row->pid;?>"><label class="control-label col-sm-4"><?php echo $row->pname?></label>
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
                        <th class="text-center">Color Names for <?php echo $pname;?></th>
                        <th class="text-center">Click to Delete</th>
                    </tr>
                    </thead>
                    <tbody id="color">
                    <?php
                    foreach ($p1->result() as $row)
                    {
                        ?><tr>
                        <td><?php echo $row->cname?></td>
                        <td>
                            <form action="http://localhost/codeignitor/personcolor/delete" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo $row->id ?>">
                                <input type="hidden" id="pid" name="pid" value="<?php echo $row->pid?>">
                                <button class="btn btn-primary btn-sm" type="submit" id="delete" name="delete">Delete</button>
                            </form>
                        </td>
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
    <br/>
    <div class="row col-sm-3 col-sm-offset-5">
        <div class="form-group">
            <label for="color"">Select Color to Add: </label>
            <form id="formColor">
                <input type="hidden" id="pid1" name="pid1">
                <select class="form-control" id="color" name="color">
                    <?php
                    foreach ($p3->result() as $row)
                    {
                        ?>
                        <option value="<?php echo $row->cid?>"><?php echo $row->cname?></option>
                    <?php }
                    ?>
                </select>
            </form>

        </div>


    </div>
    <div class="row col-sm-3 col-sm-offset-6">
        <button type="button" class="submit btn btn-primary btn-sm">Insert Color</button>
    </div>

</div>

<script type="text/javascript">
    var data;
    $(document).ready(function() {
        $(".submit").click(function() {
            var pid = $("#pid").val();
            $("#pid1").val(pid);
            var formData = $('#formColor').serialize();
            console.log(formData);
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/codeignitor/Personcolor/addColorToPerson",
                dataType: 'json',
                data: $('#formColor').serialize(),
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