<div id="content">
    <div class="container">
        <div id="notice-create-div">
            <form action="<?php echo base_url(); ?>notice/create" method="post">
                <div><input class="title" type="text" placeholder="請輸入通告標題..." name="notice_title"/></div>
                <div><textarea class="content" name="notice_content"></textarea></div>
                <div><input id="post-notice-btn" type="submit" value="張貼"/></div>
                <!-- We use nic javascript editor here -->
                <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
                <script>
                //<![CDATA[
                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                //]]>
                </script>
                <!--
                <script>
                    $('input[type=text][title]').each(function (i) {
                        $(this).addClass('input-prompt');
                        //var promptSpan = $('<span class="input-prompt"/>');
                        //$(promptSpan).attr('id', 'input-prompt-' + i);
                        $(this).val($(this).attr('title'));
                        //$(promptSpan).append($(this).attr('title'));
                        $(this).click(function () {
                            $(this).removeClass('input-prompt');
                            if ($(this).val() === $(this).attr('title')) {
                                $(this).val('');
                            }
                        });
                        $(this).blur(function () {
                            if ($(this).val() === '') {
                                $(this).addClass('input-prompt');
                                $(this).val($(this).attr('title'));
                            }
                        });
                    });
                </script>
                -->
            </form>
        </div>
    </div>
</div>