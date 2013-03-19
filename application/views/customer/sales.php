<div id="content">
    <div class="container">
        <div id="customers-filter">
            <table>
                <tr>
                    <td class="filter-title" colspan="2">篩選</td>
                </tr>
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
                            <option value="荃灣">電話廣告</option>
                            <option value="將軍澳">987廣告客</option>
                        </select>
                    </td>
                </tr>
                <!--
                <tr>
                    <th style="line-height: 20px;">
                        來電日期<br/>
                        <a href="#" onclick="datepickerChooseSingleDate(); return false;">選擇單日</a><br/>
                        <a href="#" onclick="datepickerChoosePeriod(); return false;">選擇時期</a>
                    </th>
                    <td>
                        <input type="text" class="datepicker" name="single_date" style="display: inline; width: 100px;"/>
                        <label for="period1" style="display: none; width: 100px;">起始日期</label>
                        <input type="text" class="datepicker" name="period1"  style="display: none; width: 100px;"/>
                        <label for="period2" style="display: none; width: 100px;">結束日期</label>
                        <input type="text" class="datepicker" name="period2"  style="display: none; width: 100px;"/>
                    </td>
                    <script>
                    $(function() {
                        $( ".datepicker" ).datepicker();
                    });
                    
                    function datepickerChooseSingleDate() {
                        $("label[for='period1']").css('display', 'none');
                        $("input[name='period1']").css('display', 'none');
                        $("label[for='period2']").css('display', 'none');
                        $("input[name='period2']").css('display', 'none');
                        $("input[name='single_date']").css('display', 'inline');
                    }
                    
                    function datepickerChoosePeriod() {
                        $("input[name='single_date']").css('display', 'none');
                        $("label[for='period1']").css('display', 'inline');
                        $("input[name='period1']").css('display', 'inline');
                        $("label[for='period2']").css('display', 'inline');
                        $("input[name='period2']").css('display', 'inline');
                    }
                    </script>
                    
                </tr>-->
            </table>
        </div>
        
        <div id="customers-sorting">
            <table>
                <tr>
                    <td class="sorting-title" colspan="4">排序</td>
                </tr>
                <tr>
                    <td width="25%">來電時間</td>
                    <td width="25%">上一次紀錄時間</td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
            </table>
        </div>
        
        <div class="applied-filter">以下為所有元朗分店的資料，以來電時間排序。</div>
        <div id="customers-div">
            <div class="customer">
                <div class="customer-info-div">
                    <table class="customer-info-table">
                        <tr>
                            <td>客戶姓名:楊沛昆</td>
                            <td>電話:12345678</td>
                            <td>電郵:cato.yeung@gmail.com</td>
                            <td>分店:元朗</td>
                        </tr>
                        <tr>
                            <td>來電日期:31/03/2013</td>
                            <td>廣告來源:東方新地</td>
                        </tr>
                        <tr>
                            <td>顧問:Ming</td>
                            <td>客戶服務:Coey</td>
                        </tr>
                        <tr>
                            <td>查詢內容:V面、纖腿</td>
                        </tr>
                    </table>
                </div>
                <div class="stage">
                    <div class="stage-description">顧客網上查詢，Coey接聽。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td width="100">紀錄</td>
                                <td width="860">1.想知價錢 --- Coey 08/03/2013 12:00noon</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.轉分店 --- Coey 08/03/2013 4:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.問整容 --- Coey 08/03/2013 5:00pm</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="action">
                    <button userId="1" class="booking-btn">預約</button>
                    <button userId="1" class="new-journal-btn">新增紀錄</button>
                </div>
            </div>
        </div>
        <script src="<?php echo js_url(); ?>chosen/chosen.jquery.min.js"></script>
        <script>$(".chosen").chosen();</script>
        <script>
            // showup button pop up window
            $('button.showup-btn').click(function(){
                var prependString = '';
                prependString += '<div id="flash-overlay"></div>';
                prependString += '<div id="popup-action">';
                prependString += ['<div class="outer">',
                                  '<div class="middle">',
                                  '<div class="inner">',
                                  '<div class="message">Cato Yeung 出席了嗎?</div>',
                                  '<button class="confirm-btn blue-btn" onclick="showupConfirm();">是</button>',
                                  '<button class="cancel-btn grey-btn" onclick="showupCancel();">取消</button>',
                                  '</div>',
                                  '</div>',
                                  '</div>'].join('\n');
                prependString += '</div>';
                $('body').prepend(prependString);
            });
            
            function showupConfirm() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            function showupCancel() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            // new journal button pop up window
            $('button.new-journal-btn').click(function(){
                var prependString = '';
                prependString += '<div id="flash-overlay"></div>';
                prependString += '<div id="popup-action">';
                prependString += ['<div class="outer">',
                                  '<div class="middle">',
                                  '<div class="inner">',
                                  '<div style="margin-bottom: 10px;">',
                                  '<select class="chosen" data-placeholder="Comment">',
                                  '<option></option>',
                                  '<option value="1st_confirm">1st Confirm</option>',
                                  '<option value="2nd_confirm">2nd Confirm</option>',
                                  '<option value="取消預約">取消預約</option>',
                                  '<option value="未出席">未出席</option>',
                                  '<option value="錯電">錯電</option>',
                                  '<option value="了解下先">了解下先</option>',
                                  '<option value="要去格價">要去格價</option>',
                                  '<option value="貴">貴</option>',
                                  '<option value="搵日">搵日</option>',
                                  '<option value="不在香港">不在香港</option>',
                                  '<option value="有心但今日唔得閒,再打俾佢">有心但今日唔得閒,再打俾佢</option>',
                                  '<option value="其他">其他</option>',
                                  '</select>',
                                  '</div>',
                                  
                                  '<div>',
                                  '<input type="text" placeholder="詳情..." style="width: 300px;"/>',
                                  '</div>',
                                  
                                  '<button class="confirm-btn blue-btn" onclick="showupConfirm();">新增紀錄</button>',
                                  '<button class="cancel-btn grey-btn" onclick="showupCancel();">取消</button>',
                                  '</div>',
                                  '</div>',
                                  '</div>'].join('\n');
                prependString += '</div>';
                $('body').prepend(prependString);
                $(".chosen").chosen();
            });
            
            // booking button pop up window
            $('button.booking-btn').click(function(){
                var prependString = '';
                prependString += '<div id="flash-overlay"></div>';
                prependString += '<div id="popup-action">';
                prependString += ['<div class="outer">',
                                  '<div class="middle">',
                                  '<div class="inner">',
                                  
                                  '<div>',
                                  '<table>',
                                  '<tr>',
                                  '<td>日期</td>',
                                  '<td><input class="datepicker" type="text" placeholder="請選擇預約日期..." style="width: 100px;"/></td>',
                                  '</tr>',
                                  '<tr>',
                                  '<td>時間</td>',
                                  '<td><input class="timepicker" type="text" placeholder="請選擇預約時間..." style="width: 100px;"/></td>',
                                  '</tr>',
                                  '</table>',
                                  '</div>',
                                  
                                  '<button class="confirm-btn blue-btn" onclick="bookingConfirm();">預約</button>',
                                  '<button class="cancel-btn grey-btn" onclick="bookingCancel();">取消</button>',
                                  '</div>',
                                  '</div>',
                                  '</div>'].join('\n');
                prependString += '</div>';
                $('body').prepend(prependString);
                $('.datepicker').datepicker();
                $('.timepicker').timepicker();
            });
            
            function bookingConfirm() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            function bookingCancel() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            // booking button pop up window
            $('button.invoice-btn').click(function(){
                var prependString = '';
                prependString += '<div id="flash-overlay"></div>';
                prependString += '<div id="popup-action">';
                prependString += ['<div class="outer">',
                                  '<div class="middle">',
                                  '<div class="inner">',
                                  // start of invoice table
                                  '<div>',
                                  '<table width="500">',
                                  // invoce date
                                  '<tr>',
                                  '<td width="100">開單日期</td>',
                                  '<td width="400"><input class="datepicker" type="text" placeholder="請選擇開單日期..." style="width: 150px;"/></td>',
                                  '</tr>',
                                  
                                  // course
                                  '<tr>',
                                  '<td>參加療程</td>',
                                  '<td>',
                                  '<select class="chosen" data-placeholder="請選擇參加療程..." style="width: 300px;">',
                                  '<option></option>',
                                  '<option value="Dr Pro 生活美容">Dr Pro 生活美容</option>',
                                  '<option value="Dr Pro 光學 Facial">Dr Pro 光學 Facial</option>',
                                  '<option value="Dr Pro 脫毛">Dr Pro 脫毛</option>',
                                  '<option value="Dr Reborn Latisse">Dr Reborn Latisse</option>',
                                  '<option value="Dr Reborn 整容">Dr Reborn 整容</option>',
                                  '<option value="Dr Reborn Botox">Dr Reborn Botox</option>',
                                  '<option value="Dr Reborn ATF">Dr Reborn ATF</option>',
                                  '<option value="Dr Reborn RVL / 美白針">Dr Reborn RVL / 美白針</option>',
                                  '<option value="Dr Reborn Meso Roller">Dr Reborn Meso Roller</option>',
                                  '<option value="AC Value">AC Value</option>',
                                  '<option value="Dr Reborn  I-SQ">Dr Reborn  I-SQ</option>',
                                  '<option value="Dr Reborn PRP / 人胎精華治療">Dr Reborn PRP / 人胎精華治療</option>',
                                  '<option value="Dr Reborn LASIK激光矯視代收">Dr Reborn LASIK激光矯視代收</option>',
                                  '<option value="Dr Reborn Sculpture">Dr Reborn Sculpture</option>',
                                  '<option value="Dr Pro 豐胸">Dr Pro 豐胸</option>',
                                  '</select>',
                                  '</td>',
                                  '</tr>',
                                  '<tr>',
                                  '<td></td>',
                                  '<td><input placeholder="詳情..." name="amount" type="text" style="width: 200px;"/></td>',
                                  '</tr>',
                                  
                                  // payment amount
                                  '<tr>',
                                  '<td>金額</td>',
                                  '<td><input name="amount" type="text" style="width: 100px;"/></td>',
                                  '</tr>',
                                  
                                  // deposit amount
                                  '<tr>',
                                  '<td>訂金</td>',
                                  '<td><input name="deposit" type="text" style="width: 100px;" /></td>',
                                  '</tr>',
                                  
                                  '<tr>',
                                  '<td>訂金日期</td>',
                                  '<td><input name="deposit_date" class="datepicker" type="text" placeholder="請選擇開單日期..." style="width: 150px;"/></td>',
                                  '</tr>',
                                  
                                  '</table>',
                                  '</div>',
                                  // end of invoice table
                                  
                                  '<button class="confirm-btn blue-btn" onclick="invoiceConfirm();">預約</button>',
                                  '<button class="cancel-btn grey-btn" onclick="invoiceCancel();">取消</button>',
                                  '</div>',
                                  '</div>',
                                  '</div>'].join('\n');
                prependString += '</div>';
                $('body').prepend(prependString);
                $('.datepicker').datepicker();
                $('.chosen').chosen();
            });
            
            function invoiceConfirm() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            function invoiceCancel() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            // member register button pop up window
            $('button.member-register-btn').click(function(){
                var prependString = '';
                prependString += '<div id="flash-overlay"></div>';
                prependString += '<div id="popup-action">';
                prependString += ['<div class="outer">',
                                  '<div class="middle">',
                                  '<div class="inner">',
                                  
                                  '<div>',
                                  '<input placeholder="請輸入會員號碼..." type="text" name="member_number" style="width: 150px;"/>',
                                  '</div>',
                                  
                                  '<button class="confirm-btn blue-btn" onclick="memberRegisterConfirm();">登記</button>',
                                  '<button class="cancel-btn grey-btn" onclick="memberRegisterCancel();">取消</button>',
                                  '</div>',
                                  '</div>',
                                  '</div>'].join('\n');
                prependString += '</div>';
                $('body').prepend(prependString);
                $('.datepicker').datepicker();
                $('.chosen').chosen();
            });
            
            function memberRegisterConfirm() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
            
            function memberRegisterCancel() {
                $('#popup-action').remove();
                $('#flash-overlay').remove();
            }
        </script>
    </div>
</div>