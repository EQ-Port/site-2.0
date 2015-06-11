<?php
	use common\components\TransliteUrl;
?>
<h2>Мероприятия</h2>
<ul>
<? foreach ($data as $self): ?>
	<li><a href="index.php?r=event/event&code=<? echo TransliteUrl::encodeCyrillic($self->code); ?>"><? echo $self->name ?></a></li>
	<li><? echo $self->description ?></li>
	<li><? echo $self->place ?></li>
	<li><? echo $self->address ?></li>
	<li><? echo $self->start_date ?></li>
	<li><? echo $self->end_date ?></li>
	<hr>
<? endforeach; ?>
</ul>