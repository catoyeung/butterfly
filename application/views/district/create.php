<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>district/create" method="post">
                <table>
                    <tr>
                        <th>分區名稱：</th>
                        <td><input type="text" style="width: 150px;" name="district_name"/></td>
                    </tr>
                    <tr>
                        <th>品牌：</th>
                        <td>
                            <select id="brand-chooser" data-placeholder="品牌" style="width: 200px" name="brand_id">
                                <option></option>
                                <?php
                                foreach ($brands as $brand) {
                                    echo '<option value="'.$brand->brand_id.'">'.$brand->brand_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增分區"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#brand-chooser").chosen();
});
</script>