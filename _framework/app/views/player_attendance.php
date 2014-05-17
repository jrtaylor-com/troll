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