<div id="content">
    <div class="container">
        <div id="login-form-div">
            <?php
            if(!$this->session->userdata('logged_in_user')){
            ?>
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
                        <td class="field">
                            <select id="brand-chooser" style="width: 150px" name="brand_id">
                                <?php
                                foreach ($brands as $brand)
                                {
                                    echo '<option value="'.$brand->brand_id.'">'.$brand->brand_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-name"></td>
                        <td><input class="submit-btn" type="submit" value="登入"/></td>
                    </tr>
                </table>
            </form>
            <?php
            } else {
            ?>
            
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#brand-chooser').chosen();
});
</script>