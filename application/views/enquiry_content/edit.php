<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'enquiry_content/edit/'.$enquiry_content_id; ?>" method="post">
                <table>
                    <tr>
                        <th>查詢內容名稱：</th>
                        <td><input type="text" style="width: 150px;" name="enquiry_content_name" value="<?php echo $enquiry_content_name ?>"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="更改"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
