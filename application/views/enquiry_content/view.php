<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>enquiry_content/create'">新增查詢內容</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#enquiry_contents.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">查詢內容名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#enquiry_contents}}
    <tr>
        <td>{{enquiry_content_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{enquiry_content_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>enquiry_content/edit/{{enquiry_content_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{enquiry_content_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{enquiry_content_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/enquiry_contents}}
</table>
{{/enquiry_contents.length}}
{{^enquiry_contents.length}}        
暫時沒有查詢內容。
{{/enquiry_contents.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.enquiry_contents = JSON.parse('<?php echo json_encode($enquiry_contents) ?>');
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});

function resume(enquiry_content_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'enquiry_content/resume/'; ?>'+enquiry_content_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(enquiry_content_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'enquiry_content/delete/'; ?>'+enquiry_content_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>