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
        <div class="applied-filter">以下為所有元朗分店的資料，以來電時間排序。</div>
        <div id="customers-div">
            <div class="customer">
                <div class="customer-info-div">
                    <div class="section-title">客戶個人資料</div>
                    <table class="customer-info-table">
                        <tr>
                            <th width="100">客戶姓名</th>
                            <td width="*">楊沛昆</td>
                        </tr>
                        <tr>
                            <th width="100">電話</th>
                            <td width="*">12345678</td>
                        </tr>
                        <tr>
                            <th width="100">電郵</th>
                            <td width="*">cato.yeung@gmail.com</td>
                        </tr>
                        <tr>
                            <th width="100">分店</th>
                            <td width="*">元朗</td>
                        </tr>
                    </table>
                    <div class="section-title">查詢詳情</div>
                    <table class="customer-info-table">
                        <tr>
                            <th width="100">來電日期</th>
                            <td width="*">31/03/2013</td>
                        </tr>
                        <tr>
                            <th width="100">廣告來源</th>
                            <td width="*">東方新地</td>
                        </tr>
                    </table>
                    <div class="section-title">人手分配</div>
                    <table class="customer-info-table">
                        <tr>
                            <th width="100">顧問</th>
                            <td width="*">Ming</td>
                        </tr>
                        <tr>
                            <th width="100">客戶服務</th>
                            <td width="*">Coey</td>
                        </tr>
                    </table>
                    <div class="action">
                        <button userId="1" class="showup-btn">出席</button>
                        <button userId="1" class="new-journal-btn">新增紀錄</button>
                    </div>
                </div>
                <div class="journal-div">
                    <div class="section-title">紀錄</div>
                    <!--<div class="stage-description">顧客網上查詢，Coey接聽。</div>-->
                    <div class="journal">
                        <table>
                            <tr class="stage-description">
                                <td width="15"></td>
                                <td width="*">顧客網上查詢，Coey接聽。 <br/>08/03/2013 12:00</td>
                            </tr>
                            <tr>
                                <td>1. </td>
                                <td>想知價錢 <br/>by Coey <br/>08/03/2013 12:00</td>
                            </tr>
                            <tr>
                                <td>2. </td>
                                <td>轉分店 <br/>by Coey <br/>08/03/2013 4:00</td>
                            </tr>
                            <tr>
                                <td>3. </td>
                                <td>問整容 <br/>by Coey <br/>08/03/2013 5:00</td>
                            </tr>
                        </table>
                    </div>
                    <div class="action">
                        <button userId="1" class="booking-btn">預約</button>
                        <button userId="1" class="new-journal-btn">新增紀錄</button>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
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
                    <div class="stage-description">顧客打電話到客戶服務，Coey接聽。</div>
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
                <div class="clear"></div>
            </div>
            
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
                    <div class="stage-description">顧客打電話到客戶服務，Coey接聽。</div>
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
                <div class="stage">
                    <div class="stage-description">顧客預約成功，由Consultant Ming預約，時間09/03/2013 12:00noon，分店旺角。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td width="100">紀錄</td>
                                <td width="860">1.First booking --- Consultant Ming 08/03/2013 6:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.First confirm --- Consultant Ming 08/03/2013 7:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.Second confirm --- Consultant Ming 08/03/2013 8:00pm</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="action">
                    <button userId="1" class="showup-btn">出席</button>
                    <button userId="1" class="new-journal-btn">新增紀錄</button>
                </div>
                <div class="clear"></div>
            </div>
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
                            <td>會員編號:54321</td>
                        </tr>
                        <tr>
                            <td>查詢內容:V面、纖腿</td>
                        </tr>
                    </table>
                </div>
                <div class="stage">
                    <div class="stage-description">顧客打電話到客戶服務，Coey接聽。</div>
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
                <div class="stage">
                    <div class="stage-description">顧客預約成功，由Consultant Ming預約，時間09/03/2013 12:00noon，分店旺角。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td width="100">紀錄</td>
                                <td width="860">1.First booking --- Consultant Ming 08/03/2013 6:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.First confirm --- Consultant Ming 08/03/2013 7:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.Second confirm --- Consultant Ming 08/03/2013 8:00pm</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="stage">
                    <div class="stage-description">顧客出席，由Consultant Ming接見。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td width="100">紀錄</td>
                                <td width="860">1.更改整容細節 --- Consultant Ming 09/03/2013 6:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.更改價錢 --- Consultant Ming 09/03/2013 7:00pm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.更換整容師 --- Consultant Ming 09/03/2013 8:00pm</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="action">
                    <button userId="1" class="member-register-btn">登記成為會員</button>
                    <button userId="1" class="invoice-btn">開單</button>
                    <button userId="1" class="new-journal-btn">新增紀錄</button>
                </div>
                <div class="clear"></div>
            </div>
        </div>
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
                                  '</div>',].join('\n');
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
                                  '</div>',].join('\n');
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
                                  '</div>',].join('\n');
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
    <div class="action">
        <button userId="1" class="showup-btn">出席</button><!--
        --><button userId="1" class="new-journal-btn">新增紀錄</button>
    </div>
</div>
</script>
<script id="journal-template" type="text/template">
<div class="journal-div">
<div class="section-title">紀錄</div>
<div class="journal">
    <table>
        {{#journals.length}}
        <tr class="stage-description">
            <td width="15"></td>
            <td width="*">顧客網上查詢，Coey接聽。 <br/>08/03/2013 12:00</td>
        </tr>
        <tr>
            <td>1. </td>
            <td>想知價錢 <br/>by Coey <br/>08/03/2013 12:00</td>
        </tr>
        <tr>
            <td>2. </td>
            <td>轉分店 <br/>by Coey <br/>08/03/2013 4:00</td>
        </tr>
        <tr>
            <td>3. </td>
            <td>問整容 <br/>by Coey <br/>08/03/2013 5:00</td>
        </tr>
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
    <button userId="1" class="booking-btn" customer_life_id="{{customer_life_id}}">預約</button><!--
    --><button userId="1" class="journal-create-btn" customer_life_id="{{customer_life_id}}">新增紀錄</button>
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
                    <form>
                        <table>
                            <tr>
                                <td>
                                    <select class="chosen" data-placeholder="不預約原因" style="width: 150px" name="no_booking_reason_id">
                                        <option></option>
                                        <option>留言信箱</option>
                                        <option>無人聽</option>
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text" name="no_booking_reason_details"/>
                                </td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="journal-confirm-btn">新增</button><button class="journal-cancel-btn">取消</button>
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
var customer_lives = JSON.parse('<?php echo json_encode($customer_lives) ?>');
for (var i=0;i<customer_lives.length;i++)
{
    var customer_div = $('<div class="customer"></div>');
    
    var template = $('#website-enquiry-customer-template').html();
    var customer_info_html = Mustache.to_html(template, customer_lives[i]);
    
    var template = $('#journal-template').html();
    var data = {};
    data.journals = {}
    data.customer_life_id = customer_lives[i].customer_life_id;
    var journal_html = Mustache.to_html(template, data);
    
    var clear_html = '<div class="clear"></div>';
    customer_div.append(customer_info_html).append(journal_html).append(clear_html).prependTo('#customers-div');
}

$("body").on("click", ".journal-create-btn", function(event){
    event.preventDefault();
    var template = $('#no-booking-journal-div-template').html();
    var html = Mustache.to_html(template);
    overlay(html);
    $('.chosen').chosen();
});

$("body").on("click", ".journal-cancel-btn", function(event){
    event.preventDefault();
    removeOverlay();
});

</script>