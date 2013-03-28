<div id="content">
    <div class="container">
        <div id="enquiry-form-div">
            
        </div>
    </div>
</div>

<script id="enquiry-form-template" type="text/template">
<form id="enquiry-form" action="<?php echo base_url(); ?>enquiry/create" method="post">
    <table>
        <tr>
            <td class="section" colspan="2">個人資料</td>
        </tr>
        <tr>
            <th>姓名：</th>
            <td><input type="text-field"/></td>
        </tr>
        <tr>
            <th>電郵：</th>
            <td><input type="text-field"/></td>
        </tr>
        <tr>
            <th>電話：</th>
            <td><input type="text-field"/></td>
        </tr>
        <tr>
            <td class="section" colspan="2">查詢</td>
        </tr>
        <!--<tr>
            <th>查詢品牌：</th>
            <td>
                <select id="brand-chooser" data-placeholder="查詢品牌" style="width: 300px">
                    <option></option>
                    {{#brands}}
                    <option value="{{brand_id}}">{{brand_name}}</option>
                    {{/brands}}
                </select>
            </td>
        </tr>-->
        <tr>
            <th>分區：</th>
            <td>
                <select id="district-chooser" data-placeholder="分區" style="width: 300px">
                    <option></option>
                    {{#districts}}
                    <option value="{{district_id}}">{{district_name}}</option>
                    {{/districts}}
                </select>
            </td>
        </tr>
        <tr>
            <th>查詢內容：</th>
            <td>
                <select id="enquiry-content-chooser" data-placeholder="查詢內容" style="width: 300px">
                    <option></option>
                    <?php
                    foreach ($enquiry_contents as $enquiry_content)
                    {
                        echo '<option value="'.$enquiry_content->enquiry_content_id.'">'.$enquiry_content->enquiry_content_name.'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="section" colspan="2">市場調查</td>
        </tr>
        <tr>
            <th>廣告來源：</th>
            <td>
                <select id="ad-source-chooser" data-placeholder="廣告來源" style="width: 300px">
                    <option></option>
                    <?php
                    foreach ($ad_sources as $ad_source)
                    {
                        echo '<option value="'.$ad_source->ad_source_id.'">'.$ad_source->ad_source_name.'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="section" colspan="2">分派人手</td>
        </tr>
        <tr>
            <th>客戶服務：</th>
            <td>
                <select class="chosen" placeholder="廣告來源" style="width: 300px">
                    <option value="Coey">Coey</option>
                    <option value="Mei">Mei</option>
                    <option value="Rebecca">Rebecca</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>顧問：</th>
            <td>
                <select class="chosen" placeholder="顧問" style="width: 300px">
                    <option value="Man">Man</option>
                    <option value="Co Co">Co Co</option>
                    <option value="Kayee">Kayee</option>
                    <option value="Beedel">Beedel</option>
                    <option value="Wing">Wing</option>
                    <option value="Yuki">Yuki</option>
                    <option value="Yuko">Yuko</option>
                    <option value="Joey">Joey</option>
                    <option value="Sze">Sze</option>
                    <option value="Elle">Elle</option>
                    <option value="Cora Leung">Cora Leung</option>
                    <option value="Cat">Cat</option>
                    <option value="Con2">Con2</option>
                    <option value="Royce">Royce</option>
                </select>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="確定"/><button>重新輸入</button></td>
        </tr>
    </table>
    <input name="brand_id" value="{{brand_id}}" type="hidden"/>
</form>
</script>

<script>
$(document).ready(function() {
    var data = {};
    data.brands = JSON.parse('<?php echo json_encode($brands) ?>');
    data.districts = JSON.parse('<?php echo json_encode($districts) ?>');
    var template = $('#enquiry-form-template').html();
    var html = Mustache.to_html(template, data);
    $('#enquiry-form-div').prepend(html);
    $('#brand-chooser').chosen();
    $('#district-chooser').chosen();
    $('#enquiry-content-chooser').chosen();
    $('#ad-source-chooser').chosen();
});
</script>