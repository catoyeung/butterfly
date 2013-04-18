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
                <script>
$('.chosen').chosen();
</script>
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
            <td width="*">{{no_booking_reason_category}}{{text}} <span class="created_by">{{created_by}}</span> {{created_at}}</td>
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
</div>
</script>

<script id="journal-action-template" type="text/template">
<div class="action">
    {{#invoice}}
    <button class="pay-btn" customer_life_id="{{customer_life_id}}">付款</button><!--
    -->{{/invoice}}<!--
    -->{{#showup}}
    <button class="invoice-btn" customer_life_id="{{customer_life_id}}">開單</button><!--
    -->{{/showup}}<!--
    -->{{#booking}}
    <button class="showup-btn" customer_life_id="{{customer_life_id}}">出席</button><!--
    -->{{/booking}}<!--
    -->{{#no_booking}}<!--
    --><button class="booking-btn" customer_life_id="{{customer_life_id}}">預約</button><!--
    -->{{/no_booking}}<!--
    -->{{#invoice}}<!--
    -->{{/invoice}}<!--
    -->{{^invoice}}<!--
    --><button class="journal-create-btn" customer_life_id="{{customer_life_id}}">新增紀錄</button><!--
    -->{{/invoice}}
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
                                <th>分店</th>
                                <td>
                                    <select id="branch-chooser" class="chosen" data-placeholder="分區" style="width: 150px" name="branch_id">
                                        <option></option>
                                        <?php
                                        foreach ($branches as $branch) {
                                            echo '<option value="'.$branch->branch_id.'">'.$branch->branch_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>日期</th>
                                <td>
                                    <input id="booking_datepicker" style="width: 100px" type="text" name="bookingdate"/>
                                </td>
                            </tr>
                            <tr>
                                <th>由</th>
                                <td>
                                    <input id="booking_timepicker_start" style="width: 100px" type="text" name="bookingtime_start"/>
                                </td>
                            </tr>
                            <tr>
                                <th>至</th>
                                <td>
                                    <input id="booking_timepicker_end" style="width: 100px" type="text" name="bookingtime_end"/>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button class="booking-confirm-btn" customer_life_id="{{customer_life_id}}">預約</button><button class="booking-cancel-btn">取消</button>
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

<script id="booking-journal-div-template" type="text/template">
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
                                    <select class="chosen" data-placeholder="不出席原因" style="width: 150px" name="no_showup_reason_id">
                                        {{#no_showup_reasons}}
                                        <option value="{{no_showup_reason_id}}">{{details}}</option>
                                        {{/no_showup_reasons}}
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text" name="no_showup_reason_details"/>
                                </td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="booking-journal-confirm-btn" stage_id="{{latest_stage.stage_id}}">新增</button><button class="journal-cancel-btn">取消</button>
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

<script id="showup-journal-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">新增紀錄</div>
                    <form>
                        <table>
                            <tr>
                                <td>
                                    <select class="chosen" data-placeholder="不開單原因" style="width: 150px" name="no_invoice_reason_id">
                                        {{#no_invoice_reasons}}
                                        <option value="{{no_invoice_reason_id}}">{{details}}</option>
                                        {{/no_invoice_reasons}}
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text" name="no_invoice_reason_details"/>
                                </td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="showup-journal-confirm-btn" stage_id="{{latest_stage.stage_id}}">新增</button><button class="journal-cancel-btn">取消</button>
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

<script id="showup-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">出席</div>
                    <table>
                    <tr>
                        <th>
                            出席日期
                        </th>
                        <td>
                            <input id="showup_datepicker" style="width: 100px" type="text" name="showupdate"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            出席時間
                        </th>
                        <td>
                            <input id="showup_timepicker" style="width: 100px" type="text" name="showuptime"/>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="showup-confirm-btn" customer_life_id="{{customer_life_id}}">出席</button><button class="showup-cancel-btn">取消</button>
                        </td>
                    </tr>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script id="invoice-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">開單</div>
                    <table>
                    <tr>
                        <th>分店</th>
                        <td>
                            <select id="branch-chooser" class="chosen" data-placeholder="分區" style="width: 150px" name="branch_id">
                                <option></option>
                                <?php
                                foreach ($branches as $branch) {
                                    echo '<option value="'.$branch->branch_id.'">'.$branch->branch_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            開單日期
                        </th>
                        <td>
                            <input id="invoice_datepicker" style="width: 100px" type="text" name="invoicedate"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            開單時間
                        </th>
                        <td>
                            <input id="invoice_timepicker" style="width: 100px" type="text" name="invoicetime"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            療程
                        </th>
                        <td>
                            <select id="therapy_id" class="chosen" data-placeholder="療程" style="width: 150px" name="therapy_id">
                                <option></option>
                                {{#therapies}}
                                <option value="{{therapy_id}}">{{therapy_name}}</option>
                                {{/therapies}}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            療程詳情
                        </th>
                        <td>
                            <input id="therapy_details" style="width: 200px" type="text" name="therapy_details"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            金額
                        </th>
                        <td>
                            <input id="amount" style="width: 100px" type="text" name="amount"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            已付金額
                        </th>
                        <td>
                            <input id="paid_amount" style="width: 100px" type="text" name="paid_amount"/>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="invoice-confirm-btn" customer_life_id="{{customer_life_id}}">開單</button><button class="invoice-cancel-btn">取消</button>
                        </td>
                    </tr>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script id="pay-div-template" type="text/template">
<div id="popup-action">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div id="popup-action-div">
                    <div class="title">付款</div>
                    <table>
                    <tr>
                        <th>金額</th>
                        <td>$ {{stage.amount}}</td>
                    </tr>
                    <tr>
                        <th>已款</th>
                        <td>$ {{stage.paid_amount}}</td>
                    </tr>
                    <tr>
                        <th>
                            今次付款
                        </th>
                        <td>
                            <input id="paid_amount" style="width: 100px" type="text" name="pay_amount"/>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <button class="pay-confirm-btn" customer_life_id="{{customer_life_id}}">付款</button><button class="invoice-cancel-btn">取消</button>
                        </td>
                    </tr>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script>
var customer_lives = JSON.parse('<?php echo json_encode($customer_lives) ?>');
var latest_stages = JSON.parse('<?php echo json_encode($latest_stages) ?>');
var therapies = JSON.parse('<?php echo json_encode($therapies) ?>');
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
    
    var template = $('#journal-action-template').html();
    var data = {};
    data.customer_life_id = customer_lives[i].customer_life_id;
    lastest_stage = latest_stages[customer_lives[i].customer_life_id];
    if (lastest_stage.stage_type == 'no_booking') {
        data.no_booking = true;
    } else if (lastest_stage.stage_type == 'booking') {
        data.booking = true;
    } else if (lastest_stage.stage_type == 'showup') {
        data.showup = true;
    } else if (lastest_stage.stage_type == 'invoice') {
        data.invoice = true;
    }
    var action_html = Mustache.to_html(template, data);
    
    var clear_html = '<div class="clear"></div>';
    var hr = '<div class="hr"></div>';
    customer_div.append(customer_info_html).append(journals_html).append(action_html).append(clear_html).append(hr).appendTo('#customers-div');
}


function tpStartOnHourShowCallback(hour) {
    var tpEndHour = $('#booking_timepicker_end').timepicker('getHour');
    // all valid if no end time selected
    if ($('#booking_timepicker_end').val() == '') { return true; }
    // Check if proposed hour is prior or equal to selected end time hour
    if (hour <= tpEndHour) { return true; }
    // if hour did not match, it can not be selected
    return false;
}
function tpStartOnMinuteShowCallback(hour, minute) {
    var tpEndHour = $('#booking_timepicker_end').timepicker('getHour');
    var tpEndMinute = $('#booking_timepicker_end').timepicker('getMinute');
    // all valid if no end time selected
    if ($('#booking_timepicker_end').val() == '') { return true; }
    // Check if proposed hour is prior to selected end time hour
    if (hour < tpEndHour) { return true; }
    // Check if proposed hour is equal to selected end time hour and minutes is prior
    if ( (hour == tpEndHour) && (minute < tpEndMinute) ) { return true; }
    // if minute did not match, it can not be selected
    return false;
}

function tpEndOnHourShowCallback(hour) {
    var tpStartHour = $('#booking_timepicker_start').timepicker('getHour');
    // all valid if no start time selected
    if ($('#booking_timepicker_start').val() == '') { return true; }
    // Check if proposed hour is after or equal to selected start time hour
    if (hour >= tpStartHour) { return true; }
    // if hour did not match, it can not be selected
    return false;
}
function tpEndOnMinuteShowCallback(hour, minute) {
    var tpStartHour = $('#booking_timepicker_start').timepicker('getHour');
    var tpStartMinute = $('#booking_timepicker_start').timepicker('getMinute');
    // all valid if no start time selected
    if ($('#booking_timepicker_start').val() == '') { return true; }
    // Check if proposed hour is after selected start time hour
    if (hour > tpStartHour) { return true; }
    // Check if proposed hour is equal to selected start time hour and minutes is after
    if ( (hour == tpStartHour) && (minute > tpStartMinute) ) { return true; }
    // if minute did not match, it can not be selected
    return false;
}

$("body").on("click", ".pay-btn", function(event){
    event.preventDefault();
    var data = {};
    data.customer_life_id = $(this).attr('customer_life_id');
    var lastest_stage = latest_stages[$(this).attr('customer_life_id')];
    data.stage = lastest_stage;
    var template = $('#pay-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
});

$("body").on("click", ".pay-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

$("body").on("click", ".pay-confirm-btn", function(event){
    event.preventDefault();
    var paidAmount = $("#paid_amount").val();
    var payDate = $("#pay_datepicker").val();
    var payTime = $("#pay_timepicker").val();
    var lastest_stage = latest_stages[$(this).attr('customer_life_id')];
    var stageId = lastest_stage.stage_id;
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'customer_life/pay/'; ?>'+$(this).attr('customer_life_id'));
    form.append('<input name="stage_id" value="'+stageId+'"/>');
    form.append('<input name="date" value="'+payDate+'"/>');
    form.append('<input name="time" value="'+payTime+'"/>');
    form.append('<input name="paid_amount" value="'+paidAmount+'"/>');
    form.append('<input name="redirect" value="<?php echo current_url() ?>"/>');
    form.appendTo('body');
    form.submit();
});


$("body").on("click", ".invoice-btn", function(event){
    event.preventDefault();
    var data = {};
    data.customer_life_id = $(this).attr('customer_life_id');
    data.therapies = therapies;
    var template = $('#invoice-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
    $('.chosen').chosen();
    $('#invoice_datepicker').datepicker({'minDate': -2});
    $('#invoice_timepicker').timepicker();
});

$("body").on("click", ".invoice-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

$("body").on("click", ".invoice-confirm-btn", function(event){
    event.preventDefault();
    var branchId = $("#branch-chooser").val();
    var invoiceDate = $("#invoice_datepicker").val();
    var invoiceTime = $("#invoice_timepicker").val();
    var therapyId = $("#therapy_id").val();
    var therapyDetails = $("#therapy_details").val();
    var amount = $("#amount").val();
    var paidAmount = $("#paid_amount").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'customer_life/invoice/'; ?>'+$(this).attr('customer_life_id'));
    form.append('<input name="branch_id" value="'+branchId+'"/>');
    form.append('<input name="date" value="'+invoiceDate+'"/>');
    form.append('<input name="time" value="'+invoiceTime+'"/>');
    form.append('<input name="therapy_id" value="'+therapyId+'"/>');
    form.append('<input name="therapy_details" value="'+therapyDetails+'"/>');
    form.append('<input name="amount" value="'+amount+'"/>');
    form.append('<input name="paid_amount" value="'+paidAmount+'"/>');
    form.append('<input name="redirect" value="<?php echo current_url() ?>"/>');
    form.appendTo('body');
    form.submit();
});

$("body").on("click", ".showup-btn", function(event){
    event.preventDefault();
    var data = {};
    data.customer_life_id = $(this).attr('customer_life_id');
    var template = $('#showup-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
    $('.chosen').chosen();
    $('#showup_datepicker').datepicker({'minDate': -2});
    $('#showup_timepicker').timepicker();
});

$("body").on("click", ".showup-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

$("body").on("click", ".showup-confirm-btn", function(event){
    event.preventDefault();
    var branchId = $("#branch-chooser").val();
    var showupDate = $("#showup_datepicker").val();
    var showupTime = $("#showup_timepicker").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'customer_life/showup/'; ?>'+$(this).attr('customer_life_id'));
    form.append('<input name="branch_id" value="'+branchId+'"/>');
    form.append('<input name="date" value="'+showupDate+'"/>');
    form.append('<input name="time" value="'+showupTime+'"/>');
    form.append('<input name="redirect" value="<?php echo current_url() ?>"/>');
    form.appendTo('body');
    form.submit();
});

$("body").on("click", ".booking-btn", function(event){
    event.preventDefault();
    var data = {};
    data.customer_life_id = $(this).attr('customer_life_id');
    var template = $('#booking-div-template').html();
    var html = Mustache.to_html(template, data);
    overlay(html);
    $('.chosen').chosen();
    $('#booking_datepicker').datepicker({'minDate': 0});
    $('#booking_timepicker_start').timepicker({
        showLeadingZero: false,
        onHourShow: tpStartOnHourShowCallback,
        onMinuteShow: tpStartOnMinuteShowCallback
    });
    $('#booking_timepicker_end').timepicker({
        showLeadingZero: false,
        onHourShow: tpEndOnHourShowCallback,
        onMinuteShow: tpEndOnMinuteShowCallback
    });
});

$("body").on("click", ".booking-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

$("body").on("click", ".booking-confirm-btn", function(event){
    event.preventDefault();
    var branchId = $("#branch-chooser").val();
    var bookingDate = $("#booking_datepicker").val();
    var bookingStartTime = $("#booking_timepicker_start").val();
    var bookingEndTime = $("#booking_timepicker_end").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'customer_life/book/'; ?>'+$(this).attr('customer_life_id'));
    form.append('<input name="branch_id" value="'+branchId+'"/>');
    form.append('<input name="date" value="'+bookingDate+'"/>');
    form.append('<input name="start_time" value="'+bookingStartTime+'"/>');
    form.append('<input name="end_time" value="'+bookingEndTime+'"/>');
    form.append('<input name="redirect" value="<?php echo current_url() ?>"/>');
    form.appendTo('body');
    form.submit();
});


$("body").on("click", ".journal-create-btn", function(event){
    event.preventDefault();
    latest_stage = latest_stages[$(this).attr('customer_life_id')]
    var data = {};
    
    data.latest_stage = latest_stage;
    if (latest_stage.stage_type == 'no_booking')
    {
        data.no_booking_reasons = JSON.parse('<?php echo json_encode($no_booking_reasons) ?>');
        var template = $('#no-booking-journal-div-template').html();
    } else if (latest_stage.stage_type == 'booking')
    {
        data.no_showup_reasons = JSON.parse('<?php echo json_encode($no_showup_reasons) ?>');
        var template = $('#booking-journal-div-template').html();
    } else if (latest_stage.stage_type == 'showup')
    {
        data.no_invoice_reasons = JSON.parse('<?php echo json_encode($no_invoice_reasons) ?>');
        var template = $('#showup-journal-div-template').html();
    }
    var html = Mustache.to_html(template, data);
    
    overlay(html);
    $('.chosen').chosen();
});

$("body").on("click", ".no-booking-journal-confirm-btn", function(event){
    event.preventDefault();
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
    form.submit();
});

$("body").on("click", ".booking-journal-confirm-btn", function(event){
    event.preventDefault();
    var noShowupReasonId = $("select[name='no_showup_reason_id']").val();
    var details = $("input[name='no_showup_reason_details']").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'journal/create'; ?>');
    form.append('<input name="journal_type" value="no_showup"/>');
    form.append('<input name="stage_id" value="'+$(this).attr('stage_id')+'"/>');
    form.append('<input name="reason_id" value="'+noShowupReasonId+'"/>');
    form.append('<input name="details" value="'+details+'"/>');
    form.append('<input name="redirect" value="customer/view"/>');
    form.appendTo('body');
    form.submit();
});

$("body").on("click", ".showup-journal-confirm-btn", function(event){
    event.preventDefault();
    var noInvoiceReasonId = $("select[name='no_invoice_reason_id']").val();
    var details = $("input[name='no_invoice_reason_details']").val();
    var form = $('<form style="display: hidden;"></form>');
    form.attr('method', 'post');
    form.attr('action', '<?php echo base_url().'journal/create'; ?>');
    form.append('<input name="journal_type" value="no_invoice"/>');
    form.append('<input name="stage_id" value="'+$(this).attr('stage_id')+'"/>');
    form.append('<input name="reason_id" value="'+noInvoiceReasonId+'"/>');
    form.append('<input name="details" value="'+details+'"/>');
    form.append('<input name="redirect" value="customer/view"/>');
    form.appendTo('body');
    form.submit();
});

$("body").on("click", ".journal-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

</script>