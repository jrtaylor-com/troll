<div style="border:1px solid #000">
	<span style="display: inline-block; width:100px;">Class</span>
	<span style="display: inline-block; width:100px;">Credits</span>
	<span style="display: inline-block; width:100px;">Level</span>
	<?php foreach ((array)$class->Classes as $c): ?>
		<?php if (($credit_total = $c->Reconciled + $c->Credits) > 0): ?>
			<div>
				<span style="display: inline-block; width:100px;"><?= $c->ClassName ?></span>
				<span style="display: inline-block; width:100px;"><?= $credit_total ?></span>
				<span style="display: inline-block; width:100px;"><?= floor($credit_total / 12) + 1 ?></span>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>