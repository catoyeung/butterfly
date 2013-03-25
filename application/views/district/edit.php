<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'district/edit/'.$district_id; ?>" method="post">
                <table>
                    <tr>
                        <th>分區名稱：</th>
                        <td><input type="text" style="width: 150px;" name="district_name" value="<?php echo $district_name ?>"/></td>
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
