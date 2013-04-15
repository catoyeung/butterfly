<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>post/create'">新增用戶身份</button></div>
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
            <button onclick="location.href='<?php echo base_url(); ?>post/edit/{{post_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{post_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{post_id}})">刪除</button>
            {{/deleted}}
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
var data = {};
data.posts = JSON.parse('<?php echo json_encode($posts) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(post_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'post/resume/'; ?>'+post_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(post_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'post/delete/'; ?>'+post_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>