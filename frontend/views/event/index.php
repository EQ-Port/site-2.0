<?php
	use common\components\TransliteUrl;
?>
<h2>Мероприятия</h2>
<div class="row">
<? foreach ($data as $self): ?>
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <img src="/site-2.0/frontend/web/i/logo.png" alt="">
                <div class="caption">
                    <h3><a href="index.php?r=event/event&code=<? echo TransliteUrl::encodeCyrillic($self->code); ?>"><? echo $self->name ?></a></h3>
                    <p class="jumbotron"><? echo $self->description ?></p>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <i class="fa fa-location-arrow"></i>
                            <? echo $self->place ?>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <i class="fa fa-map-marker"></i>
                            <? echo $self->address ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <i class="fa fa-calendar"></i>
                            <? echo $self->start_date ?>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <i class="fa fa-calendar-o"></i>
                            <? echo $self->end_date ?>
                        </div>
                    </div>
                    <hr>
                    <p><a href="index.php?r=event/event&code=<? echo TransliteUrl::encodeCyrillic($self->code); ?>" class="btn btn-info" role="button">Подробнее</a></p>
                </div>
            </div>
        </div>
<? endforeach; ?>
</div>