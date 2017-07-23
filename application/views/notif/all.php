<?php include(APPPATH.'views/includes/header.php'); ?>
<?php include(APPPATH.'views/includes/team-rank.php'); ?>
<style type="text/css">
	.tr-link {
		cursor: pointer;
	}
</style>
<div class="container main-content">
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<?php include(APPPATH.'views/includes/left-menu.php'); ?>
	</div>
	<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
		<table class="table">
            <tbody>
            <?php 
                foreach($all_notif as $notif){ 
                    if($notif['notif_show'] == 1){
            ?>
                <tr class="table-row tr-link" onclick="openLink(1, '<?php echo $notif['notif_url'].'/'.md5($notif['notif_id']) ?>')">
                    <td class="table-text">
                        <p><?php echo $notif['notif_detail']; ?></p>
                    </td>
                    <td class="march">
                       <?php echo $notif['notif_time']; ?>
                    </td>
                    <td>
                    	<?php echo $notif['notif_icon']; ?>
                    </td>
                </tr>
            <?php } else{ ?>
                <tr class="table-row tr-link" onclick="openLink(0, '<?php echo md5($notif['notif_id']); ?>')">
                    <td class="table-text">
                        <p><?php echo $notif['notif_detail']; ?></p>
                    </td>
                    <td class="march">
                       <?php echo $notif['notif_time']; ?>
                    </td>
                    <td>
                    	<?php echo $notif['notif_icon']; ?>
                    	<a href="#detail-notif" id="<?php echo md5($notif['notif_id']); ?>" class="popup-detail-notif hidden" data-url="<?php echo $notif['notif_url'].'/'.md5($notif['notif_id']) ?>">
                    </td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
	</div>
</div>
<script type="text/javascript">
function openLink(tipe, other){
	if(tipe == 1){
		window.location.href = other;
	} else{
		$("#" + other).trigger("click");
	}
}
</script>
<?php include(APPPATH.'views/includes/footer.php'); ?>