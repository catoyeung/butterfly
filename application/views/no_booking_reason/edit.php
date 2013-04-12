<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'no_booking_reason/edit/'.$no_booking_reason_id; ?>" method="post">
                <table>
                    <tr>
                        <th>不預約原因：</th>
                        <td><input type="text" style="width: 150px;" name="details" value="<?php echo $details ?>"/></td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td><input type="text" style="width: 150px;" name="sequence" value="<?php echo $sequence ?>"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="更改"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
