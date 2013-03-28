<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>enquiry_content/create" method="post">
                <table>
                    <tr>
                        <th>查詢內容名稱：</th>
                        <td><input type="text" style="width: 150px;" name="enquiry_content_name"/></td>
                    </tr>
                    <tr>
                        <th>美容分類：</th>
                        <td>
                            <select id="treatment-type-chooser" data-placeholder="美容分類" style="width: 150px" name="treatment_type_id">
                                <option></option>
                                <option value="">沒有美容分類</option>
                                <?php
                                foreach ($treatment_types as $treatment_type) {
                                    echo '<option value="'.$treatment_type->treatment_type_id.'">'.$treatment_type->treatment_type_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增查詢內容"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#brand-chooser").chosen();
    $("#treatment-type-chooser").chosen();
});
</script>