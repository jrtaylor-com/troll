<h3>Kingdoms of Amtgard</h3>
<?php foreach ((array)$kingdoms->Kingdoms as $k): ?>
	<div>
		<a href="<?= $base_url ?>/kingdom/info/<?= $k->KingdomId ?>"><?= $k->KingdomName ?></a>
	</div>
<?php endforeach; ?>