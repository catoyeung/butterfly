<style>
.authorization-by-post-edit-div th {
    text-align: right;
    padding: 8px 0;
    vertical-align: middle;
}

.authorization-by-post-edit-div td {
    text-align: left;
    padding: 8px 0;
    vertical-align: middle;
}
</style>
<div id="content">
    <div class="container">
        <div class="authorization-by-post-edit-div">
            <form action="<?php echo base_url().'authorization_by_post/edit/'.$post->post_id; ?>" method="post">
                <table>
                    <tr>
                        <th>用戶身份：</th>
                        <td><?php echo $post->post_name ?></td>
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
