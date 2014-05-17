<div style="border:1px solid #000">
	<span style="display: inline-block; width:300px;">Note</span>
	<span style="display: inline-block; width:150px;">Description</span>
	<span style="display: inline-block; width:100px;">Date</span>
	<?php foreach ((array)$notes as $kn => $vn): ?>
		<?php if ($kn != 'Status' and $kn != 'Code'): ?>
			<div>
				<span style="display: inline-block; width:300px;"><?= $vn->Note ?></span>
				<span style="display: inline-block; width:150px;"><?= $vn->Description ?></span>
				<span style="display: inline-block; width:100px;"><?= $vn->Date ?></span>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>