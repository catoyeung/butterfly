<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>no_showup_reason/create" method="post">
                <table>
                    <tr>
                        <th>不出席原因：</th>
                        <td><input type="text" style="width: 150px;" name="details"/></td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td><input type="text" style="width: 150px;" name="sequence"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增不出席原因"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
