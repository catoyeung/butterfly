<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'treatment_type/edit/'.$treatment_type_id; ?>" method="post">
                <table>
                    <tr>
                        <th>美容分類名稱：</th>
                        <td><input type="text" style="width: 150px;" name="treatment_type_name" value="<?php echo $treatment_type_name ?>"/></td>
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
