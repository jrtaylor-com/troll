<a href="<?= $base_url ?>/kingdom">Kingdoms</a> &#10172; <a href="<?= $base_url ?>/kingdom/info/<?= $roster->Roster{0}->KingdomId ?> "><?= $roster->Roster{0}->KingdomName ?></a> &#10172; <?= $roster->Roster{0}->ParkName ?>
<h3><?= $roster->Roster{0}->ParkName ?></h3>
<?php foreach ((array)$roster->Roster as $r): ?>
	<div>
		<a href="<?= $base_url ?>/player/info/<?= $r->MundaneId ?>"><?= $r->Persona ?></a>
	</div>
<?php endforeach; ?>