<table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <? foreach($results as $i){?>
                <tr>
                    <td><?= $i->ID?></td>
                    <td><a  href="<?= site_url().'?msgID='.$i->sender_email ?>"><?= $i->sender_email?></a></td>
                    <td><?= $i->status?></td>
                    <td><button onclick="view_message(<?= $i->ID?>)">Show Message</button></td>
                </tr>
            <?}?>    
            </tbody>
        </table>
        <script>
        function view_message(msg_id){
    
        jQuery.ajax({
         type : "get",
         dataType : "TEXT",
         url : "<?php echo admin_url('admin-ajax.php');?>?action=show_message_details&msg_id="+msg_id,
         success: function(response) {
            console.log(response);
              $( "#dialog" ).dialog( "open" );
              $( "#dialog" ).dialog({
                   modal: true
                });
           
         },
         error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
        //alert(" message can't loaded ");
            }
      });
      //console.log(image_links);
}
         $(function() {
            $( "#dialog" ).dialog({
              autoOpen: false,
              show: {
                effect: "blind",
                duration: 1000
              },
              hide: {
                effect: "explode",
                duration: 1000
              }
            });
         
            
          });
        </script>