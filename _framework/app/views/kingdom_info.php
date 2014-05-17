<a href="<?= $base_url ?>/kingdom">Kingdoms</a>
<h3><?= $info->kingdom_name ?></h3>
<?php foreach ((array)$info->Parks as $kp): ?>
	<div>
		<?php if ($kp->Active == 'Active'): ?>
			<a href="<?= $base_url ?>/park/info/<?= $kp->ParkId ?>"><?= $kp->Name ?></a>
		<?php endif; ?>
	</div>
<?php endforeach; ?>