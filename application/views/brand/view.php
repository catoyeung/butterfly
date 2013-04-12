<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>brand/create'">新增品牌</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#brands.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">品牌名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#brands}}
    <tr>
        <td>{{brand_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{brand_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>brand/edit/{{brand_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{brand_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{brand_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/brands}}
</table>
{{/brands.length}}
{{^brands.length}}        
暫時沒有品牌。
{{/brands.length}}
</script>

<script>
var data = {};
data.brands = JSON.parse('<?php echo json_encode($brands) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(brand_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'brand/resume/'; ?>'+brand_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(brand_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'brand/delete/'; ?>'+brand_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>