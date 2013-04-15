<div id="content">
    <div class="container">
        <div class="model-create-div">
            <form action="<?php echo base_url(); ?>branch/create" method="post">
                <table>
                    <tr>
                        <th>分店名稱：</th>
                        <td><input type="text" style="width: 150px;" name="branch_name"/></td>
                    </tr>
                    <tr>
                        <th>分區：</th>
                        <td>
                            <select id="district-chooser" data-placeholder="分區" style="width: 150px" name="district_id">
                                <option></option>
                                <?php
                                foreach ($districts as $district) {
                                    echo '<option value="'.$district->district_id.'">'.$district->district_name.'</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align:left;"><input type="submit" value="新增分店"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
$("#district-chooser").chosen();
</script>