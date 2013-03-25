<div id="content">
    <div class="container">
        <div id="models-div">
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>ad_source/create'">新增廣告來源</button></div>
        </div>
    </div>
</div>

<script id="models-div-template" type="text/template">
{{#ad_sources.length}}
<table>
<tr>
    <th style="width:30px;">Id</th>
    <th style="width:150px;">廣告來源名稱</th>
    <th style="width:780px; text-align:right;"></th>
</tr>
    {{#ad_sources}}
    <tr>
        <td>{{ad_source_id}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{ad_source_name}}</td>
        <td style="text-align:right;">
            <button onclick="location.href='<?php echo base_url(); ?>ad_source/edit/{{ad_source_id}}'">編輯</button>
            {{#deleted}}
            <button onclick="resume({{ad_source_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button onclick="del({{ad_source_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/ad_sources}}
</table>
{{/ad_sources.length}}
{{^ad_sources.length}}        
暫時沒有廣告來源。
{{/ad_sources.length}}
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.ad_sources = JSON.parse('<?php echo json_encode($ad_sources) ?>');
    var template = $('#models-div-template').html();
    var html = Mustache.to_html(template, data);
    $('#models-div').prepend(html);
});

function resume(ad_source_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'ad_source/resume/'; ?>'+ad_source_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(ad_source_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'ad_source/delete/'; ?>'+ad_source_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>