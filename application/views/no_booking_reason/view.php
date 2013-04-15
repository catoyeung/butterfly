<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>no_booking_reason/create'">新增不預約原因</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#no_booking_reasons.length}}
<table>
    <tr>
        <th style="width:30px;">Id</th>
        <th style="width:150px;">不預約原因</th>
            <th style="width:150px;">排序</th>
        <th style="width:780px; text-align:right;"></th>
    </tr>
    {{#no_booking_reasons}}
    <tr>
        <td>{{no_booking_reason_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{details}}</td>
        <td>{{sequence}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>no_booking_reason/edit/{{no_booking_reason_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{no_booking_reason_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{no_booking_reason_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/no_booking_reasons}}
</table>
{{/no_booking_reasons.length}}
{{^no_booking_reasons.length}}        
暫時沒有不預約原因。
{{/no_booking_reasons.length}}
</script>

<script>
var data = {};
data.no_booking_reasons = JSON.parse('<?php echo json_encode($no_booking_reasons) ?>');
var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

function resume(no_booking_reason_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'no_booking_reason/resume/'; ?>'+no_booking_reason_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(no_booking_reason_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'no_booking_reason/delete/'; ?>'+no_booking_reason_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>