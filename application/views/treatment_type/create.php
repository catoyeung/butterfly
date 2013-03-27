<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>treatment_type/create" method="post">
                <table>
                    <tr>
                        <th>美容分類名稱：</th>
                        <td><input type="text" style="width: 150px;" name="treatment_type_name"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增美容分類"/></td>
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