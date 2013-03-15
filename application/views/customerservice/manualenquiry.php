<div id="content">
    <div class="container">
        <div id="manualenquiry-form-div">
            <form id="manualenquiry-form" action="<?php echo base_url(); ?>customerservice/manualenquiry" method="post">
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
                    <tr>
                        <th>查詢品牌：</th>
                        <td>
                            <select class="chosen" placeholder="查詢內容" style="width: 300px">
                                <option value="drpro">Dr. Pro</option>
                                <option value="bealady">Be a Lady</option>
                                <option value="medicbeauty">Medic Beauty</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>分店：</th>
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
                        <th>查詢內容：</th>
                        <td>
                            <select class="chosen" placeholder="查詢內容" style="width: 300px">
                                <option value="整容">整容</option>
                                <option value="$500 MTS微針">$500 MTS微針</option>
                                <option value="$388 激光脫毛">$388 激光脫毛</option>
                                <option value="Facial">Facial</option>
                                <option value="按摩護理">按摩護理</option>
                                <option value="彩光去斑">彩光去斑</option>
                                <option value="嫩膚">嫩膚</option>
                                <option value="醫學換膚">醫學換膚</option>
                                <option value="沒有醫生做的項目 - 其他">沒有醫生做的項目 - 其他</option>
                                <option value="脫毛咨詢">脫毛咨詢</option>
                                <option value="纖體咨詢">纖體咨詢</option>
                                <option value="美白針咨詢">美白針咨詢</option>
                                <option value="MTS-PRO微針嫩膚及去妊娠紋">MTS-PRO微針嫩膚及去妊娠紋</option>
                                <option value="BOTOX咨詢">BOTOX咨詢</option>
                                <option value="Tissue Filler咨詢">Tissue Filler咨詢</option>
                                <option value="手持雜誌優惠信">手持雜誌優惠信</option>
                                <option value="RF射頻收緊去皺">RF射頻收緊去皺</option>
                                <option value="於fanspage內投票,送免費試做">於fanspage內投票,送免費試做</option>
                                <option value="$1000 botox">$1000 botox</option>
                                <option value="$1,000up 透明質酸">$1,000up 透明質酸</option>
                                <option value="澳門查詢">澳門查詢</option>
                                <option value="會計部問題紙">會計部問題紙</option>
                                <option value="$1,000up肉毒桿菌止汗">$1,000up肉毒桿菌止汗</option>
                                <option value="簽續期信延續已有療程">簽續期信延續已有療程</option>
                                <option value="轉分店享用已有療程">轉分店享用已有療程</option>
                                <option value="已完成療程之File">已完成療程之File</option>
                                <option value="RVL(透明質酸嫩膚)">RVL(透明質酸嫩膚)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="section" colspan="2">市場調查</td>
                    </tr>
                    <tr>
                        <th>廣告來源：</th>
                        <td>
                            <select class="chosen" placeholder="廣告來源" style="width: 300px">
                                <option value="東方新地(t111)">東方新地(t111)</option>
                                <option value="便利(t222)">便利(t222)</option>
                                <option value="3周(t333)">3周(t333)</option>
                                <option value="忽周(t444)">忽周(t444)</option>
                                <option value="已於Groupbuyer團購網購買coupon(t777)">已於Groupbuyer團購網購買coupon(t777)</option>
                                <option value="上網(t555)">上網(t555)</option>
                                <option value="澳門日報(t666)">澳門日報(t666)</option>
                                <option value="Team 9-試做 (team 9)">Team 9-試做 (team 9)</option>
                                <option value="網上咨詢(t119)">網上咨詢(t119)</option>
                                <option value="雜誌[未能說出那本](t120)">雜誌[未能說出那本](t120)</option>
                                <option value="公司Blog(t121)">公司Blog(t121)</option>
                                <option value="Team 9-投票 (team 9)">Team 9-投票 (team 9)</option>
                                <option value="網上免費試做(t122)">網上免費試做(t122)</option>
                                <option value="Yahoo查詢(t125)">Yahoo查詢(t125)</option>
                                <option value="東Touch(t126)">東Touch(t126)</option>
                                <option value="Facebook免費試做(t127)">Facebook免費試做(t127)</option>
                                <option value="朋友介紹(t128)">朋友介紹(t128)</option>
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
            </form>
        </div>
        <script src="<?php echo js_url(); ?>chosen/chosen.jquery.min.js"></script>
        <script>$(".chosen").chosen();</script>
    </div>
</div>