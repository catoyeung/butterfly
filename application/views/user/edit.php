<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'user/edit/'.$user_id; ?>" method="post">
                <table>
                    <tr>
                        <th>登入名稱：</th>
                        <td><input type="text" style="width: 150px;" name="username" value="<?php echo $user->username; ?>"/></td>
                    </tr>
                    <tr>
                        <th>用戶身份：</th>
                        <td>
                            <select id="post-chooser" data-placeholder="用戶身份" style="width: 300px" name="post_id">
                                <option></option>
                                <?php
                                foreach ($posts as $post) {
                                    if ($user->post_id == $post->post_id) 
                                        echo '<option selected="true" value="'.$post->post_id.'">'.$post->post_name.'</option>';
                                    else
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
                                    if (in_array($brand->brand_id, $belonging_brand_ids))
                                        echo '<option selected="True" value="'.$brand->brand_id.'">'.$brand->brand_name.'</option>';
                                    else
                                        echo '<option value="'.$brand->brand_id.'">'.$brand->brand_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>顯示名稱：</th>
                        <td><input type="text" style="width: 150px;" name="display_name" value="<?php echo $user->display_name; ?>"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;">
                            <input type="submit" value="更改用戶"/>
                            <button id="reset-password-btn">重設密碼</button>
                        </td>
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
    
    $('#reset-password-btn').click(function(event){
        event.preventDefault();
        var result = confirm('重設密碼?');
        if (result === true) {
            $('<form id="password-reset-form" method="post" action="<?php echo base_url().'user/reset_password/'.$user_id; ?>"></form>').appendTo('body').submit();
            return false;
        } else {
            return false;
        }
    });
});
</script>