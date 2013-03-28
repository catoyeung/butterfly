<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'enquiry_content/edit/'.$enquiry_content_id; ?>" method="post">
                <table>
                    <tr>
                        <th>查詢內容名稱：</th>
                        <td><input type="text" style="width: 150px;" name="enquiry_content_name" value="<?php echo $enquiry_content->enquiry_content_name ?>"/></td>
                    </tr>
                    <tr>
                        <th>美容分類：</th>
                        <td>
                            <select id="treatment-type-chooser" data-placeholder="美容分類" style="width: 150px" name="treatment_type_id">
                                <option></option>
                                <?php
                                foreach ($treatment_types as $treatment_type) {
                                    if ($enquiry_content->treatment_type_id == $treatment_type->treatment_type_id)
                                        echo '<option selected="true" value="'.$treatment_type->treatment_type_id.'">'.$treatment_type->treatment_type_name.'</option>';
                                    else
                                        echo '<option value="'.$treatment_type->treatment_type_id.'">'.$treatment_type->treatment_type_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
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
<script>
$(document).ready(function() {
    $("#treatment-type-chooser").chosen();
});
</script>