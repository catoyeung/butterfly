<div id="content">
    <div class="container">
        <div id="create-post-div">
            <form action="<?php echo base_url().'post/edit/'.$post_id; ?>" method="post">
                <table>
                    <tr>
                        <th>用戶身份：</th>
                        <td><input type="text" style="width: 150px;" name="post_name" value="<?php echo $post_name ?>"/></td>
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
