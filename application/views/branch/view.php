<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>branch/create'">新增分店</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#branches.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">分店名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#branches}}
    <tr>
        <td>{{branch_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{branch_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>branch/edit/{{branch_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{branch_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{branch_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/branches}}
</table>
{{/branches.length}}
{{^branches.length}}        
暫時沒有分店。
{{/branches.length}}
</script>

<script>
var data = {};
data.branches = JSON.parse('<?php echo json_encode($branches) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(branch_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'branch/resume/'; ?>'+branch_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(branch_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'branch/delete/'; ?>'+branch_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>