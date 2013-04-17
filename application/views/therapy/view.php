<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>therapy/create'">新增療程</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#therapys.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">療程名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#therapys}}
    <tr>
        <td>{{therapy_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{therapy_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>therapy/edit/{{therapy_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{therapy_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{therapy_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/therapys}}
</table>
{{/therapys.length}}
{{^therapys.length}}        
暫時沒有療程。
{{/therapys.length}}
</script>

<script>
var data = {};
data.therapys = JSON.parse('<?php echo json_encode($therapys) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(therapy_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'therapy/resume/'; ?>'+therapy_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(therapy_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'therapy/delete/'; ?>'+therapy_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>