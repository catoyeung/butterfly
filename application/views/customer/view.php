<div id="content">
    <div class="container">
        <div id="customers-filter">
            <div class="filter-title">篩選</div>
            <table>
                <tr>
                    <th>客戶名稱</th>
                    <td><input type="text" name="customer_name" style="width: 100px;"/></td>
                </tr>
                <tr>
                    <th>客戶電話</th>
                    <td><input type="text" name="customer_phone" style="width: 100px;"/></td>
                </tr>
                <tr>
                    <th>會員號碼</th>
                    <td><input type="text" name="member_number" style="width: 100px;"/></td>
                </tr>
                <tr>
                    <th width="100">品牌</th>
                    <td width="860">
                        <select class="chosen" data-placeholder="品牌" style="width: 300px">
                            <option></option>
                            <option value="佐敦">Dr. Pro</option>
                            <option value="銅鑼灣">Be a Lady</option>
                            <option value="將軍澳">Medic Beauty</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="100">分店</th>
                    <td width="860">
                        <select class="chosen" data-placeholder="分店" style="width: 300px">
                            <option></option>
                            <option value="佐敦">佐敦</option>
                            <option value="銅鑼灣">銅鑼灣</option>
                            <option value="將軍澳">將軍澳</option>
                            <option value="荃灣">荃灣</option>
                            <option value="九龍灣">九龍灣</option>
                            <option value="旺角">旺角</option>
                            <option value="元朗">元朗</option>
                            <option value="中環">中環</option>
                            <option value="堅道">堅道</option>
                            <option value="荔枝角">荔枝角</option>
                            <option value="沙田">沙田</option>
                            <option value="澳門">澳門</option>
                            <option value="美孚">美孚</option>
                            <option value="上水">上水</option>
                            <option value="屯門">屯門</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>階段</th>
                    <td>
                        <select class="chosen" data-placeholder="階段" style="width: 300px">
                            <option></option>
                            <option value="佐敦">未預約。</option>
                            <option value="銅鑼灣">已預約，未出席。</option>
                            <option value="將軍澳">已出席，未開單。</option>
                            <option value="荃灣">已開單。</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>來源</th>
                    <td>
                        <select class="chosen" data-placeholder="來源" style="width: 300px">
                            <option></option>
                            <option value="佐敦">電話查詢</option>
                            <option value="銅鑼灣">網上填表查詢</option>
                            <option value="荃灣">電話廣告</option>
                            <option value="將軍澳">987廣告客</option>
                            <option value="荃灣">外部來源</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>排序</th>
                    <td>
                        <select class="chosen" data-placeholder="排序" style="width: 200px">
                            <option></option>
                            <option value="佐敦">來電時間</option>
                            <option value="銅鑼灣">上一次紀錄時間</option>
                        </select>
                        <select class="chosen" data-placeholder="排序順序" style="width: 96px">
                            <option></option>
                            <option value="佐敦">由上至下</option>
                            <option value="銅鑼灣">由下至上</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="applied-filter">以下為所有元朗分店的資料，以來電時間排序。</div>
        <div id="customers-div">
            
        </div>
    </div>
</div>
<script id="website-enquiry-customer-template" type="text/template">
<div class="customer-info-div">
    <div class="section-title">客戶個人資料</div>
    <table class="customer-info-table">
        <tr>
            <th width="100">客戶姓名</th>
            <td width="*">{{customer_name}}</td>
        </tr>
        <tr>
            <th width="100">電話</th>
            <td width="*">{{customer_phone_no}}</td>
        </tr>
        <tr>
            <th width="100">電郵</th>
            <td width="*">{{customer_email}}</td>
        </tr>
        <tr>
            <th width="100">分區</th>
            <td width="*">{{district_name}}</td>
        </tr>
    </table>
    <div class="section-title">查詢詳情</div>
    <table class="customer-info-table">
        <tr>
            <th width="100">來電時間</th>
            <td width="*">{{created_at}}</td>
        </tr>
        <tr>
            <th width="100">廣告來源</th>
            <td width="*">{{ad_source_name}}</td>
        </tr>
    </table>
    <div class="section-title">人手分配</div>
    <table class="customer-info-table">
        <tr>
            <th width="100">客戶服務</th>
            <td width="*">{{cs_name}}</td>
        </tr>
        <tr>
            <th width="100">顧問</th>
            <td width="*">{{consultant_name}}</td>
        </tr>
    </table>
    <!--<div class="action">
        <button userId="1" class="showup-btn">出席</button>
        <button userId="1" class="new-journal-btn">新增紀錄</button>
    </div>-->
</div>
</script>
<script id="journal-template" type="text/template">
<div class="journal-div">
<div class="section-title">紀錄</div>
<div class="journal">
    <table>
        {{#journals.length}}
        {{#journals}}
        <tr {{#is_stage_description}}
            class="stage-description"
            {{/is_stage_description}}>
            <td width="15">{{count}}</td>
            <td width="*">{{no_booking_reason_category}}{{text}}</td>
        </tr>
        {{/journals}}
        {{/journals.length}}
        {{^journals.length}}
        <tr>
            <td></td>
            <td>此用戶目前沒有任何紀錄。</td>
        </tr>
        {{/journals.length}}
    </table>
</div>
<div class="action">
    <button class="booking-btn" customer_life_id="{{customer_life_id}}">預約</button><!--
    --><button class="journal-create-btn" customer_life_id="{{customer_life_id}}">新增紀錄</button>
</div>
</div>
</script>

<script id="no-booking-journal-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">新增紀錄</div>
                    <form id="no-booking-journal-form">
                        <table>
                            <tr>
                                <td>
                                    <select class="chosen" data-placeholder="不預約原因" style="width: 150px" name="no_booking_reason_id">
                                        {{#no_booking_reasons}}
                                        <option value="{{no_booking_reason_id}}">{{details}}</option>
                                        {{/no_booking_reasons}}
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text" name="no_booking_reason_details"/>
                                </td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="no-booking-journal-confirm-btn" stage_id="{{latest_stage.stage_id}}">新增</button><button class="journal-cancel-btn">取消</button>
                                </td> 
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script id="booking-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">預約</div>
                    <form id="no-booking-journal-form">
                        <table>
                            <tr>
                                <td>
                                    <select class="chosen" data-placeholder="不預約原因" style="width: 150px" name="no_booking_reason_id">
                                        {{#no_booking_reasons}}
                                        <option value="{{no_booking_reason_id}}">{{details}}</option>
                                        {{/no_booking_reasons}}
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text" name="no_booking_reason_details"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="no-booking-journal-confirm-btn" stage_id="{{latest_stage.stage_id}}">新增</button><button class="journal-cancel-btn">取消</button>
                                </td> 
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</script>
<script>
$('.chosen').chosen();
var customer_lives = JSON.parse('<?php echo json_encode($customer_lives) ?>');
var latest_stages = JSON.parse('<?php echo json_encode($latest_stages) ?>');
for (var i=0;i<customer_lives.length;i++)
{
    var customer_div = $('<div class="customer"></div>');
    
    var template = $('#website-enquiry-customer-template').html();
    var customer_info_html = Mustache.to_html(template, customer_lives[i]);
    
    var template = $('#journal-template').html();
    var data = {};
    data.journals = customer_lives[i].journals;
    data.customer_life_id = customer_lives[i].customer_life_id;
    var journals_html = Mustache.to_html(template, data);
    
    var clear_html = '<div class="clear"></div>';
    var hr = '<div class="hr"></div>'
    customer_div.append(customer_info_html).append(journals_html).append(clear_html).append(hr).appendTo('#customers-div');
}

$("body").on("click", ".booking-btn", function(event){
    event.preventDefault();
    var data = {};
    var template = $('#booking-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
    $('.chosen').chosen();
});

$("body").on("click", ".journal-create-btn", function(event){
    event.preventDefault();
    latest_stage = latest_stages[$(this).attr('customer_life_id')]
    var data = {};
    data.no_booking_reasons = JSON.parse('<?php echo json_encode($no_booking_reasons) ?>');
    data.latest_stage = latest_stage;
    var template = $('#no-booking-journal-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
    $('.chosen').chosen();
});

$("body").on("click", ".no-booking-journal-confirm-btn", function(event){
    event.preventDefault();
    //$('tr[web_enquiry_form_id="'+$(this).attr('web_enquiry_form_id')+'"]').show();
    //$(this).parent().parent().remove();
    
    var noBookingReasonId = $("#no-booking-journal-form select[name='no_booking_reason_id']").val();
    var details = $("#no-booking-journal-form input[name='no_booking_reason_details']").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'journal/create'; ?>');
    form.append('<input name="journal_type" value="no_booking"/>');
    form.append('<input name="stage_id" value="'+$(this).attr('stage_id')+'"/>');
    form.append('<input name="reason_id" value="'+noBookingReasonId+'"/>');
    form.append('<input name="details" value="'+details+'"/>');
    form.append('<input name="redirect" value="customer/view"/>');
    form.appendTo('body');
    // record current position before submit the form
    form.submit();
});

$("body").on("click", ".journal-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

</script>