<style>
.authorization-by-post-div th {
    text-align: right;
    padding: 8px 0;
    vertical-align: middle;
}

.authorization-by-post-div td {
    text-align: left;
    padding: 8px 0;
    vertical-align: middle;
}

.controller-methods-div table{
    text-align: left;
    width: 960px;
    border: 1px solid #e7e7e7;
    background: #fff;
}

.controller-methods-div th {
    text-align: left;
    color: #201F1F;
    padding: 8px 15px;
    background: #f9f9f9;
    background: -webkit-linear-gradient(top, #f9f9f9 0%,#f5f5f5 100%);
    background: -moz-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
}

.controller-methods-div td {
    color: #4c4c4c;
    padding: 3px 15px;
    font-size: 13px;
}

.controller-methods-div tr {
    border-bottom: 1px solid #e7e7e7;
}

</style>
<div id="content">
    <div class="container">
        <div class="authorization-by-post-div">
            <form action="<?php echo base_url().'authorization_by_post/edit/'.$post->post_id; ?>" method="post">
                <table>
                    <tr>
                        <th>用戶身份：</th>
                        <td><?php echo $post->post_name ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="controller-methods-div">
                                <table>
                                    <tr>
                                        <th style="width:30px;"></th>
                                        <th style="width:150px;">Controller</th>
                                        <th style="width:780px;">Methods</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Brand</td>
                                        <td>create[post,get],edit[post,get]</td>
                                    </tr>
                                </table>
                            </div>
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
