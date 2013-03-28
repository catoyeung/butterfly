<div id="content">
    <div class="container">
        <div id="models-div">
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#posts.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">用戶身份</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#posts}}
    <tr>
        <td>{{post_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}>{{post_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>authorization_by_post/edit/{{post_id}}'">修改權限</button>
        </td>
    </tr>
    {{/posts}}
</table>
{{/posts.length}}
{{^posts.length}}        
暫時沒有職位。
{{/posts.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.posts = JSON.parse('<?php echo json_encode($posts) ?>');
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});
</script>