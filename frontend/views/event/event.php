<?php 
use frontend\widgets\RCalendar;
?>
<h3><? echo RCalendar::widget(); ?></h3>
<h1><? echo $self['name']; ?></h1>
<pre>
<?
	print "$self[description]<br />$self[place]<br />$self[address]<br />$self[start_date] $self[end_date]<hr>";
?>
</pre>