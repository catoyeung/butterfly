<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>no_booking_reason/create" method="post">
                <table>
                    <tr>
                        <th>不預約原因：</th>
                        <td><input type="text" style="width: 150px;" name="details"/></td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td><input type="text" style="width: 150px;" name="sequence"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增不預約原因"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
