<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>district/create'">新增分區</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#districts.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">品牌名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#districts}}
    <tr>
        <td>{{district_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{district_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>district/edit/{{district_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{district_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{district_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/districts}}
</table>
{{/districts.length}}
{{^districts.length}}        
暫時沒有分區。
{{/districts.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.districts = JSON.parse('<?php echo json_encode($districts) ?>');
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});

function resume(district_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'district/resume/'; ?>'+district_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(district_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'district/delete/'; ?>'+district_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>