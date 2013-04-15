<div id="content">
    <div class="container">
        <div id="notices-div">
        </div>
    </div>
</div>
<script id="notices-div-template" type="text/template">
{{#notices.length}}
    {{#notices}}
    <div class="notice">
    <div class="notice-title">{{title}}</div>
    <p class="meta-info">作者: {{display_name}}<br/>發佈時間: {{created_at}}</p>
    <div class="notice-content">{{content}}</div>
    </div>
    <div class="horizontal-hr"></div>
    {{/notices}}
{{/notices.length}}
{{^notices.length}}        
暫時沒有通告。
{{/notices.length}}
</script>

<script>
var data = {};
data.notices = JSON.parse('<?php echo json_encode($notices) ?>');
var template = $('#notices-div-template').html();
var html = Mustache.to_html(template, data);
$('#notices-div').append(html);
</script>