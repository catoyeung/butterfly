        <div id="footer">
            <ul id="footer-list">
                <li>
                    <p class="title"><?php echo lang('footer.feedback_title')?></p>
                    <p class="description"><?php echo lang('footer.feedback_description')?></p>
                </li>
            </ul>
            <div class="horizontal-hr"></div>
            <div id="footer-remark">此網站由Cato Yeung設計及管理</div>
        </div>
    </div>
<script>
// If cookie is set, scroll to the position saved in the cookie.
<?php
    $scroll_top = $this->session->flashdata('scroll_top');
    if ($scroll_top != '')
    {
?>
$(document).scrollTop(<?php echo $scroll_top ?>);
<?php
    }
?>

// When a button is clicked...
//$('button').on("click", function() {
    // Set a cookie that holds the scroll position.
    //$.cookie("scroll", $(document).scrollTop() );
//});
</script>
</body>
</html>