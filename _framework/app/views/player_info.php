<a href="<?= $base_url ?>/kingdom">Kingdoms</a> &#10172; <a href="<?= $base_url ?>/kingdom/info/<?= $park->KingdomInfo->KingdomId ?> "><?= $park->KingdomInfo->KingdomName ?></a> &#10172; <a href="<?= $base_url ?>/park/info/<?= $park->ParkInfo->ParkId ?>"><?= $park->ParkInfo->ParkName ?></a> &#10172; <?= $info->Player->Persona ?> 

<h4>Player Details</h4>
<div style="border:1px solid #000">
	<span style="display: inline-block; width:100px;">Persona</span>
	<span style="display: inline-block; width:100px;">Waivered</span>
	<span style="display: inline-block; width:100px;">Park</span>
	<span style="display: inline-block; width:100px;">Kingdom</span>
		<div>
			<span style="display: inline-block; width:100px;"><?= $info->Player->Persona ?></span>
			<span style="display: inline-block; width:100px;"><?= ($info->Player->Waivered) ? 'Yes' : 'No' ?></span>
			<span style="display: inline-block; width:100px;"><?= $park->ParkInfo->ParkName ?></span>
			<span><?= $park->KingdomInfo->KingdomName ?></span>
		</div>
		<a href="http://amtgard.com/ork/orkui/index.php?Route=Player/index/<?= $info->Player->MundaneId ?>">ORK Profile</a>
</div>
<h4>Played Classes</h4>
<div style="border:1px solid #000">
	<span style="display: inline-block; width:100px;">Class</span>
	<span style="display: inline-block; width:100px;">Credits</span>
	<span style="display: inline-block; width:100px;">Level</span>
	<?php foreach ((array)$class->Classes as $c): ?>
		<?php if (($credit_total = $c->Reconciled + $c->Credits) > 0): ?>
			<div>
				<span style="display: inline-block; width:100px;"><?= $c->ClassName ?></span>
				<span style="display: inline-block; width:100px;"><?= $credit_total ?></span>
				<span style="display: inline-block; width:100px;"><?= (($level = (floor($credit_total / 12) + 1)) >= 6) ? 6 : $level ?></span>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<h4>Attendance</h4>
<div style="border:1px solid #000">
	<span style="display: inline-block; width:100px;">Date</span>
	<span style="display: inline-block; width:100px;">Class</span>
	<span>Kingdom - Park</span>
	<?php foreach ((array)$attendance->Attendance as $a): ?>
		<div>
			<span style="display: inline-block; width:100px;"><?= $a->Date ?></span>
			<span style="display: inline-block; width:100px;"><?= $a->ClassName ?></span>
			<span><?= $a->KingdomName ?> - <?= $a->ParkName ?></span>
		</div>
	<?php endforeach; ?>
</div>