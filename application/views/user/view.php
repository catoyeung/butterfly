<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>user/create'">新增用戶身份</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#users.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">顯示名稱</th>
    <th style="width:150px;">用戶身份</th>
    <th style="width:150px;">登入名稱</th>
    <th style="width:150px;">密碼</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#users}}
    <tr>
        <td>{{crm_user_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{display_name}}</td>
        <td>{{post_name}}</td>
        <td>{{username}}</td>
        <td>{{password}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>user/edit/{{crm_user_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{crm_user_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{crm_user_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/users}}
</table>
{{/users.length}}
{{^users.length}}        
暫時沒有人張貼通告。
{{/users.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.users = JSON.parse('<?php echo json_encode($users) ?>');
    console.log(data.users);
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});

function resume(crm_user_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'user/resume/'; ?>'+crm_user_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(crm_user_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'user/delete/'; ?>'+crm_user_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>