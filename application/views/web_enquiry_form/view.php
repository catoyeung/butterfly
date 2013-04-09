<div id="content">
    <div class="container">
        <div id="models-div">
            <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
            <div class="create-btn-div"><button onclick="location.href='<?php echo base_url(); ?>web_enquiry_form/create'">新增網頁查詢</button></div>
        </div>
    </div>
</div>
<script id="models-div-template" type="text/template">
{{#web_enquiry_forms.length}}
<table>
<tr>
    <th width="70">姓名</th>
    <th width="60">年齡</th>
    <th width="80">電話</th>
    <th width="100">分區</th>
    <th width="130">廣告來源</th>
    <th width="110">查詢內容</th>
    <th width="100">詳情</th>
    <th width="100">查詢時間</th>
    <th width="*"></th>
</tr>
    {{#web_enquiry_forms}}
    <tr web_enquiry_form_id="{{web_enquiry_form_id}}">
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{customer_name}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{customer_age}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{customer_phone_no}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{district_name}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{ad_source_name}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{enquiry_content_name}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{details}}</td>
        <td {{#deleted}}
            style="text-decoration: line-through;" 
            {{/deleted}}
            >{{created_at}}</td>
        <td style="text-align:right;">
            <button class="approve-btn" web_enquiry_form_id="{{web_enquiry_form_id}}">審批</button>
            <button class="modify-btn" web_enquiry_form_id="{{web_enquiry_form_id}}">編輯</button>
            {{#deleted}}
            <button class="resume-btn" onclick="resume({{web_enquiry_form_id}})">還原</button>
            {{/deleted}}
            {{^deleted}}
            <button class="del-btn" onclick="del({{web_enquiry_form_id}})">刪除</button>
            {{/deleted}}
        </td>
    </tr>
    {{/web_enquiry_forms}}
</table>
{{/web_enquiry_forms.length}}
{{^web_enquiry_forms.length}}        
暫時沒有網頁查詢。
{{/web_enquiry_forms.length}}
</script>

<script id="modify-tr-template" type="text/template">
<tr>
    <td><input style="width: 100%;" name="customer_name" value="{{web_enquiry_form.customer_name}}"/></td>
    <td><input style="width: 100%;" name="customer_age" value="{{web_enquiry_form.customer_age}}"/></td>
    <td><input style="width: 100%;" name="customer_phone_no" value="{{web_enquiry_form.customer_phone_no}}"/></td>
    <td>
        <select class="chosen" data-placeholder="分區" style="width: 100%" name="district_id">
            <option></option>
            {{#districts}}
                {{#selected}}
                <option selected value={{district_id}}>{{district_name}}</option>
                {{/selected}}
                {{^selected}}
                <option value={{district_id}}>{{district_name}}</option>
                {{/selected}}
            {{/districts}}
        </select>
    </td>
    <td>
        <select class="chosen" data-placeholder="廣告來源" style="width: 100%" name="ad_source_id">
            <option></option>
            {{#ad_sources}}
                {{#selected}}
                <option selected value={{ad_source_id}}>{{ad_source_name}}</option>
                {{/selected}}
                {{^selected}}
                <option value={{ad_source_id}}>{{ad_source_name}}</option>
                {{/selected}}
            {{/ad_sources}}
        </select>
    </td>
    <td>
        <select class="chosen" data-placeholder="查詢內容" style="width: 100%" name="enquiry_content_id">
            <option></option>
            {{#enquiry_contents}}
                {{#selected}}
                <option selected value={{enquiry_content_id}}>{{enquiry_content_name}}</option>
                {{/selected}}
                {{^selected}}
                <option value={{enquiry_content_id}}>{{enquiry_content_name}}</option>
                {{/selected}}
            {{/enquiry_contents}}
        </select>
    </td>
    <td><input style="width: 100%;" name="details" value="{{web_enquiry_form.details}}"/></td>
    <td>{{web_enquiry_form.created_at}}</td>
    <td style="text-align:right;">
        <button class="modify-confirm-btn" web_enquiry_form_id="{{web_enquiry_form.web_enquiry_form_id}}">更改</button>
        <button class="modify-cancel-btn" web_enquiry_form_id="{{web_enquiry_form.web_enquiry_form_id}}">取消</button>
    </td>
</tr>
</script>

<script>
jQuery.getKeyByAttr = function(array, attr, value) {
    for(var key in array){
        if(array[key][attr] == value){
            return array[key];
        }
    }
    return null;
};

jQuery.markSelected = function(array, attr, value) {
    var newArray = array;
    for(var key in newArray){
        if(newArray[key][attr] == value){
            newArray[key].selected = true;
        }
    }
    return newArray;
};

var web_enquiry_forms = JSON.parse('<?php echo json_encode($web_enquiry_forms) ?>');
var districts = JSON.parse('<?php echo json_encode($districts) ?>');
var ad_sources = JSON.parse('<?php echo json_encode($ad_sources) ?>');
var enquiry_contents = JSON.parse('<?php echo json_encode($enquiry_contents) ?>');
var data = {};
data.web_enquiry_forms = web_enquiry_forms;

var template = $('#models-div-template').html();
var html = Mustache.to_html(template, data);
$('#models-div').prepend(html);

$('.modify-btn').click(function(event) {
    event.preventDefault();
    var data = {};
    web_enquiry_form = $.getKeyByAttr(web_enquiry_forms, 'web_enquiry_form_id', $(this).attr('web_enquiry_form_id'))
    var marked_districts = $.markSelected(districts, 'district_id', web_enquiry_form.district_id);
    var marked_ad_sources = $.markSelected(ad_sources, 'ad_source_id', web_enquiry_form.ad_source_id);
    var marked_enquiry_contents = $.markSelected(enquiry_contents, 'enquiry_content_id', web_enquiry_form.enquiry_content_id);
    data.web_enquiry_form = web_enquiry_form;
    data.districts = marked_districts;
    data.ad_sources = marked_ad_sources;
    data.enquiry_contents = enquiry_contents;
    var template = $('#modify-tr-template').html();
    var html = Mustache.to_html(template, data);
    $(this).parent().parent().before(html);
    $('tr[web_enquiry_form_id="'+$(this).attr('web_enquiry_form_id')+'"]').hide();
    // Enable chosen plugin
    $('.chosen').chosen();
    // Disabled all resume and delete button
    $('.approve-btn').attr('disabled', '');
    $('.modify-btn').attr('disabled', '');
    $('.resume-btn').attr('disabled', '');
    $('.del-btn').attr('disabled', '');
});

$("body").on("click", ".modify-cancel-btn", function(event){
    event.preventDefault();
    $('tr[web_enquiry_form_id="'+$(this).attr('web_enquiry_form_id')+'"]').show();
    $(this).parent().parent().remove();
    
    // Enable all resume and delete button
    $('.approve-btn').removeAttr('disabled');
    $('.modify-btn').removeAttr('disabled');
    $('.resume-btn').removeAttr('disabled');
    $('.del-btn').removeAttr('disabled');
});

$("body").on("click", ".modify-confirm-btn", function(event){
    event.preventDefault();
    //$('tr[web_enquiry_form_id="'+$(this).attr('web_enquiry_form_id')+'"]').show();
    //$(this).parent().parent().remove();
    
    var modifyTr = $(this).parent().parent();
    var customerName = modifyTr.find("input[name='customer_name']").val();
    var customerAge = modifyTr.find("input[name='customer_age']").val();
    var customerPhoneNo = modifyTr.find("input[name='customer_phone_no']").val();
    var districtId = modifyTr.find("select[name='district_id']").val();
    var adSourceId = modifyTr.find("select[name='ad_source_id']").val();
    var enquiryContentId = modifyTr.find("select[name='enquiry_content_id']").val();
    var details = modifyTr.find("input[name='details']").val();
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'web_enquiry_form/edit/'; ?>'+$(this).attr('web_enquiry_form_id'));
    form.style.display = 'hidden';
    document.body.appendChild(form);
    // record current position before submit the form
    $.cookie("scroll", $(document).scrollTop());
    form.submit();
    
    // Enable all resume and delete button
    //$('.approve-btn').removeAttr('disabled');
    //$('.modify-btn').removeAttr('disabled');
    //$('.resume-btn').removeAttr('disabled');
    //$('.del-btn').removeAttr('disabled');
});

function resume(web_enquiry_form_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'web_enquiry_form/resume/'; ?>'+web_enquiry_form_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}

function del(web_enquiry_form_id) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?php echo base_url().'web_enquiry_form/delete/'; ?>'+web_enquiry_form_id);
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>