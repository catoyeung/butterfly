<div id="content">
    <div class="container">
        <div id="delete-post-div">
            <form action="<?php echo base_url().'post/delete/'.$post_id; ?>" method="post">
                <table>
                    <tr>
                        <th>用戶身份：</th>
                        <td><?php echo $post_name ?></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="刪除"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
