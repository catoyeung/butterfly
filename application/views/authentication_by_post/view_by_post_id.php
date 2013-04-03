<div id="content">
    <div class="container">
        <div class="authentication-by-post-div">
            <form>
                <div id="post-name">用戶身份：<?php echo $post->post_name ?></div>
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="controller-methods-div">
                                
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<script id="create-tr-template" type="text/template">
<tr class="create-tr">
    <td style="vertical-align: top;"><input class="controller-input" type="text" placeholder="Example: user" style="margin:0px; width:100%;"/></td>
    <td><textarea class="methods-textarea" placeholder="Example: create[get,post], edit[get,post]" style="width: 300px; max-width: 300px;"></textarea></td>
    <td style="text-align:right;"><input class="confirm-create-btn" type="submit" value="新增"/><input class="cancel-create-btn" type="submit" value="取消"/></td>
</tr>
</script>

<script id="controller-methods-table-template" type="text/template">
<table>
    <tr>
        <th style="width:200px;">Controller</th>
        <th>Methods</th>
        <th></th>
    </tr>
    {{#controllers}}
    <tr>
        <td>{{controller}}</td>
        <td>{{controller_methods}}</td>
        <td style="text-align:right;"><button class="modify-btn" 
            controller="{{controller}}"
            post_id="<?php echo $post->post_id ?>">更改</button><button onclick="del(<?php echo $post->post_id ?> ,'{{controller}}')">刪除</button></td>
    </tr>
    {{/controllers}}
    <tr class="create-btn-tr">
        <td></td>
        <td></td>
        <td style="text-align:right;"><input class="create-btn" type="submit" value="新增"/></td>
    </tr>
</table>
</script>

<script>
var data = {};
data.controllers = JSON.parse('<?php echo json_encode($controllers) ?>');
var template = $('#controller-methods-table-template').html();
var html = Mustache.to_html(template, data);
$('.controller-methods-div').prepend(html);
            
$('.create-btn').click(function(event) {
    event.preventDefault();
    // Display create tr
    var template = $('#create-tr-template').html();
    var html = Mustache.to_html(template);
    $('.create-btn-tr').before(html);
    $('.create-btn-tr').hide();
    // Disabled all modify and delete button
    $('.modify-btn').attr('disabled', '');
    $('.delete-btn').attr('disabled', '');
});

$('.modify-btn').click(function(event) {
    event.preventDefault();
    var form = $("<form action='<?php echo base_url().'authentication_by_post/edit' ?>' method='get'></form>");
    form.css('display', 'none');
    form.append('<input name="controller" value="'+$(this).attr('controller')+'"/>');
    form.append('<input name="post_id" value="'+$(this).attr('post_id')+'"/>');
    form.appendTo('body').submit();
});

function del(post_id, controller)
{
    event.preventDefault();
    var r = window.confirm("你確定要永久刪除此Controller之設定?");
    if (r==true)
    {
        var form = $("<form action='<?php echo base_url().'authentication_by_post/delete' ?>' method='post'></form>");
        form.css('display', 'none');
        form.append('<input name="controller" value="'+controller+'"/>');
        form.append('<input name="post_id" value="'+post_id+'"/>');
        form.appendTo('body').submit();
    }
}

$("body").on("click", ".cancel-create-btn", function(event){
    event.preventDefault();
    $('.create-tr').remove();
    $('.create-btn-tr').show();
    $('.modify-btn').removeAttr('disabled');
    $('.delete-btn').removeAttr('disabled');
});

$("body").on("click", ".confirm-create-btn", function(event){
    event.preventDefault();
    //alert($('.create-tr .controller-input').val());
    var form = $("<form action='<?php echo base_url().'authentication_by_post/create' ?>' method='post'></form>");
    form.css('display', 'none');
    var controller = $('.create-tr .controller-input').val();
    var methods = $('.create-tr .methods-textarea').val();
    form.append('<input name="controller" value="'+controller+'"/>');
    form.append('<input name="methods" value="'+methods+'"/>');
    form.append('<input name="post_id" value="'+'<?php echo $post->post_id; ?>'+'"/>');
    form.appendTo('body').submit();
});

</script>