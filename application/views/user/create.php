<div id="content">
    <div class="container">
        <div class='model-create-div'>
            <form action="<?php echo base_url(); ?>user/create" method="post">
                <table>
                    <tr>
                        <th>登入名稱：</th>
                        <td><input type="text" style="width: 150px;" name="username"/></td>
                    </tr>
                    <tr>
                        <th>密碼：</th>
                        <td><input type="text" style="width: 150px;" name="password"/></td>
                    </tr>
                    <tr>
                        <th>用戶身份：</th>
                        <td>
                            <select id="post-chooser" data-placeholder="用戶身份" style="width: 300px" name="post_id">
                                <option></option>
                                <?php
                                foreach ($posts as $post) {
                                    echo '<option value="'.$post->post_id.'">'.$post->post_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>品牌：</th>
                        <td>
                            <select id="brand-chooser" data-placeholder="品牌" multiple style="width: 400px" name="brand_ids[]">
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
                        <th>顯示名稱：</th>
                        <td><input type="text" style="width: 150px;" name="display_name"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增用戶"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#post-chooser").chosen();
    $("#brand-chooser").chosen();
});
</script>