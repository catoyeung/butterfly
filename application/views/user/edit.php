<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <?php print_r($user); ?>
            <form action="<?php echo base_url().'user/edit/'.$user_id; ?>" method="post">
                <table>
                    <tr>
                        <th>登入名稱：</th>
                        <td><input type="text" style="width: 150px;" name="username" value="<?php echo $user->username; ?>"/></td>
                    </tr>
                    <tr>
                        <th>密碼：</th>
                        <td><input type="text" style="width: 150px;" name="password" value="<?php echo $user->password; ?>"/></td>
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
                                    echo '<option value="'.$post->post_id.'">'.$post->post_name.'</option>';
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
                        <td style="text-align:left;"><input type="submit" value="更改用戶"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#post-chooser").chosen();
});
</script>