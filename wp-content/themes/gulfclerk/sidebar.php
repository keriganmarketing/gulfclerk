<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package GulfClerk
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}


$service_category = get_field('service_category');
if ($service_category == 'Courts') {
    $courtslist = 'active';
    $publiclist = '';
    $otherlist = ''; ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $('li.courts ul').slideDown(10);
            });
        </script>

<?php }

if ($service_category == 'Public Records') {
    $courtslist = '';
    $publiclist = 'active';
    $otherlist = '' ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $('li.public ul').slideDown(10);
            });
        </script>

<?php }
if ($service_category == 'Other Services') {
    $courtslist = '';
    $publiclist = '';
    $otherlist = 'active'; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('li.other ul').slideDown(10);
        });
    </script>

<?php }
?>

<div id="sidebar" class="col res-14 tab-12 wide-12 ph-1">
    <div class="accordion">
        <ul>
            <li class="courts <?php echo $courtslist; ?>"><a>Courts</a>
                <?php include('inc/bucket1.php'); ?></li>
        </ul>
    </div>
    <div class="accordion">
        <ul>
            <li class="public <?php echo $publiclist; ?>"><a>Public Records</a>
                <?php include('inc/bucket2.php'); ?></li>
        </ul>
    </div>
    <div class="accordion">
        <ul>
            <li class="other <?php echo $otherlist; ?>"><a>Other Services</a>
                <?php include('inc/bucket3.php'); ?></li>
        </ul>
    </div>
    <div id="feat-buttons">
        <ul>
            <?php include('inc/feat-buttons.php'); ?>
        </ul>
    </div>
</div>
