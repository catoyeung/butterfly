<div id="content">
    <div class="container">
        <div id="login-form-div">
            <form id="login-form" action="<?php echo base_url(); ?>account/login" method="post">
                <table>
                    <tr>
                        <th colspan="2">登入系統</th>
                    </tr>
                    <tr>
                        <td class="field-name">登入名稱：</td>
                        <td class="field"><input type="text" name="username" style="width: 150px;"/></td>
                    </tr>
                    <tr>
                        <td class="field-name">密碼：</td>
                        <td class="field"><input type="password" name="password" style="width: 150px;"/></td>
                    </tr>
                    <tr>
                        <td class="field-name"></td>
                        <td><input class="submit-btn" type="submit" value="登入"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>