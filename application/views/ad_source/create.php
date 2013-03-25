<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>ad_source/create" method="post">
                <table>
                    <tr>
                        <th>廣告來源名稱：</th>
                        <td><input type="text" style="width: 150px;" name="ad_source_name"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增廣告來源"/></td>
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