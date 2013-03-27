<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>treatment_type/create'">新增美容分類</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#treatment_types.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">美容分類名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#treatment_types}}
    <tr>
        <td>{{treatment_type_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{treatment_type_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>treatment_type/edit/{{treatment_type_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{treatment_type_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{treatment_type_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/treatment_types}}
</table>
{{/treatment_types.length}}
{{^treatment_types.length}}        
暫時沒有美容分類。
{{/treatment_types.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.treatment_types = JSON.parse('<?php echo json_encode($treatment_types) ?>');
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});

function resume(treatment_type_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'treatment_type/resume/'; ?>'+treatment_type_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(treatment_type_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'treatment_type/delete/'; ?>'+treatment_type_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>