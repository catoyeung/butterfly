<style>
.authentication-by-post-edit-div th {
    text-align: right;
    padding: 8px 0;
    vertical-align: middle;
}

.authentication-by-post-edit-div td {
    text-align: left;
    padding: 8px 0;
    vertical-align: middle;
}

.authentication-by-post-edit-div #post-name {
    text-align: left;
}
</style>
<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'authentication_by_post/edit'; ?>" method="post">
                <table>
                    <input type="hidden" 
                           name="controller"
                           value="<?php echo $controller ?>" />
                    <input type="hidden" 
                           name="post_id"
                           value="<?php echo $post->post_id ?>" />
                    <tr>
                        <th>Controller：</th>
                        <td><?php echo $controller ?></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: top;">Methods：</th>
                        <td>
                            <textarea class="methods-textarea" 
                                      placeholder="Example: create[get,post], edit[get,post]" 
                                      style="width: 300px; max-width: 300px;"
                                      name="methods"><?php echo $methods ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input class="modify-confirm-btn" type="submit" value="更改"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
