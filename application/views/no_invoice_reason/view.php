<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>no_invoice_reason/create'">新增不開單原因</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#no_invoice_reasons.length}}
<table>
    <tr>
        <th style="width:30px;">Id</th>
        <th style="width:150px;">不開單原因</th>
            <th style="width:150px;">排序</th>
        <th style="width:780px; text-align:right;"></th>
    </tr>
    {{#no_invoice_reasons}}
    <tr>
        <td>{{no_invoice_reason_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{details}}</td>
        <td>{{sequence}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>no_invoice_reason/edit/{{no_invoice_reason_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{no_invoice_reason_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{no_invoice_reason_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/no_invoice_reasons}}
</table>
{{/no_invoice_reasons.length}}
{{^no_invoice_reasons.length}}        
暫時沒有不開單原因。
{{/no_invoice_reasons.length}}
</script>

<script>
var data = {};
data.no_invoice_reasons = JSON.parse('<?php echo json_encode($no_invoice_reasons) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(no_invoice_reason_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'no_invoice_reason/resume/'; ?>'+no_invoice_reason_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(no_invoice_reason_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'no_invoice_reason/delete/'; ?>'+no_invoice_reason_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>