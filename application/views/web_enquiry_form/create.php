<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>web_enquiry_form/create" method="post">
                <table>
                    <tr>
                        <th>姓名：</th>
                        <td><input name="name" type="text"/></td>
                    </tr>
                    <tr>
                        <th>電話：</th>
                        <td><input name="phone_no" type="text"/></td>
                    </tr>
                    <tr>
                        <th>年齡：</th>
                        <td><input name="age" type="text"/></td>
                    </tr>
                    <tr>
                        <th>電郵：</th>
                        <td><input name="email" type="text"/></td>
                    </tr>
                    <tr>
                        <th>分店：</th>
                        <td>
                            <select id="district-chooser" data-placeholder="分店" style="width: 300px" name="district_id">
                                <option></option>
                                <?php
                                foreach ($districts as $district)
                                {
                                    echo '<option value="'.$district->district_id.'">'.$district->district_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>廣告來源：</th>
                        <td>
                            <select id="ad-source-chooser" data-placeholder="廣告來源" style="width: 300px" name="ad_source_id">
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
                        <th>查詢內容：</th>
                        <td>
                            <select id="enquiry-content-chooser" data-placeholder="查詢內容" style="width: 300px" name="enquiry_content_id">
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
                        <th>問題：</th>
                        <td><textarea name="questions"></textarea></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$('#district-chooser').chosen();
$('#ad-source-chooser').chosen();
$('#enquiry-content-chooser').chosen();
</script>