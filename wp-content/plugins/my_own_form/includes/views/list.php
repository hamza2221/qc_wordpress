<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/font-awesome.min.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <div class="row">
        
        <div class="col-md-8">
        <div class="page_header">
            <h3>Messages From Contact Us Form</h3>
        </div>
            <table class="table table-striped" width="100%">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="60%">Sender Email</th>
                <th width="10%">Status</th>
                <th width="20%" class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)) {?>
            <?php foreach ($results as $i): ?>
                <tr <?php if($i->status==0) echo 'class="warning"' ?>>
                    <td><?=$i->ID?></td>
                    <td><?=$i->sender_email?></td>
                    <td><?=helper_iif($i->status, "Readed", "Unread");?></td>
                    <td class="text-right">
                    <button title="show message" class="btn btn-info " onclick="show_message(<?=$i->ID?>)"><li class="fa fa-search"></li></button>
                    <a href="javascript:void(0)" title="Delete Message" class="btn btn-small btn-danger " onclick="delete_message(<?=$i->ID?>)"><li class="fa fa-remove"></li></a>
                    </td>
                </tr>
            <?php endforeach;?>
            <?php } else {?>
            <?php foreach ($results as $i): ?>
                <tr>
                    <td colspan="4">No Message</td>

                </tr>
            <?php endforeach;?>
            <?php }?>

        </tbody>
    </table>

        </div>
    </div>
<div id="dialog" title="Message Details">
  <div id="mof_msg_details">
    <h3 hidden id="mof_wait_msg">Please wait...</h3>

    <table id="msg_fields" class="table table-bordered table-hover table-striped">


    </table>
</div>
</div>

<script>
    function show_message(msg_id) {
        //alert(msg_id);

        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>?action=mof_show_message_details&msg_id="+msg_id,
            type: "get",
            data: "JSON",
            success: function (response) {
                $("#mof_wait_msg").hide();

        $.each($.parseJSON(response), function(idx, obj) {
            console.log
                //var li_html='<li class="list-group-item">'+(obj.meta_key).substring(4)+': '+(obj.meta_value)+'</li>';
                var tr_html='<tr><th width="20%">'+(obj.meta_key).substring(4)+'</th><td  width="80%">'+(obj.meta_value)+'</td></tr>';
                $("#msg_fields").append(tr_html);

            });
        $( "#dialog" ).dialog({
            width: 450,
            hide: 'slide',
            modal:true,
            show: 'slide',
            close: function(event, ui) { location.reload(); }
        });
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(textStatus, errorThrown);
        }


    });
}

function delete_message(msg_id) {
     
    $confirm_res=confirm("are you sure");
    if ($confirm_res==true) {
       
        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>?action=mof_delete_message&msg_id="+msg_id,
            type: "get",
            data: "text",
            success: function (response) {
                alert(response+'Message Deleted Successfully');
                location.reload();
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(textStatus, errorThrown);
        }


    });
}}

</script>
