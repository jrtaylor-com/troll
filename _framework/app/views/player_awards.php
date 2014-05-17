<div style="border:1px solid #000">
	<span style="display: inline-block; width:100px;">Date</span>
	<span style="display: inline-block; width:100px;">Award</span>
	<span>Given By</span>
	<?php foreach ((array)$awards->Awards as $a): ?>
		<div>
			<span style="display: inline-block; width:100px;"><?= $a->Date ?></span>
			<span style="display: inline-block; width:100px;"><?= $a->CustomAwardName ?></span>
			<span><?= $a->Note ?></span>
		</div>
	<?php endforeach; ?>
</div>