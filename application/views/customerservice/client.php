<div id="content">
    <div class="container">
        <div id="clients-filter">
            <table>
                <tr>
                    <td class="filter-title" colspan="2">篩選</td>
                </tr>
                <tr>
                    <th>分店</th>
                    <td>
                        <select class="chosen" placeholder="分店" style="width: 300px">
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
                        <select class="chosen" placeholder="階段" style="width: 300px">
                            <option value="佐敦">未預約。</option>
                            <option value="銅鑼灣">已預約，未出席。</option>
                            <option value="將軍澳">已出席，未開單。</option>
                            <option value="荃灣">已開單。</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>日期</th>
                    <td><input type="text" class="datepicker" /></td>
                    <script>$(function() {
                      $( ".datepicker" ).datepicker();
                    });
                    </script>
                    
                </tr>
            </table>
        </div>
        <div class="applied-filter">以下為所有元朗分店的資料</div>
        <div id="clients-div">
            <div class="client">
                <div class="client-info-div">
                    <table class="client-info">
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
                    <div class="stage-description">未預約。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td>紀錄</td>
                                <td>1.想知價錢</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.轉分店</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.問整容</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="stage">
                    <div class="stage-description">已預約，未出席。</div>
                    <div class="stage-journal">
                        <table>
                            <tr>
                                <td>紀錄</td>
                                <td>1.First booking</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.First confirm</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.Second confirm</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo js_url(); ?>chosen/chosen.jquery.min.js"></script>
        <script>$(".chosen").chosen();</script>
    </div>
</div>