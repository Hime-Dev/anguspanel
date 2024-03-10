<h3 class="sekmeBaslik">Bakiye Kayıtları</h3>

<div class="logs">
	<?php

		$loglar = $database->query("SELECT * FROM bakiye_kaydi ORDER BY time DESC ");

		while ($log = $loglar->fetch_assoc()) {
			?>

				<div class="log-row">
					<div class="log-icerik"><?php echo $log['icerik'] ?></div>
					<div class="log-time"><?php gecen_sure($log['time']) ?></div>
				</div>

			<?php
		}

	?>
</div>