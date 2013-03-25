<div id="content">
    <div class="container">
        <div class="model-edit-div">
            <form action="<?php echo base_url().'ad_source/edit/'.$ad_source_id; ?>" method="post">
                <table>
                    <tr>
                        <th>廣告來源名稱：</th>
                        <td><input type="text" style="width: 150px;" name="ad_source_name" value="<?php echo $ad_source_name ?>"/></td>
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
