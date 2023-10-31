<div class="dashboard-wrapper mx-auto mt-2">
    <div class="w-100 dashboard-img position-relative">
        <img class="w-100 h-100" src="public/image/back.jpg" alt="">
        <div class="position-absolute w-100" style="bottom: 130px;">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col">
                        <div class="home_content d-flex flex-row align-items-end justify-content-start">
                            <div class="current_page">参加イベント</div>
                            <div class="breadcrumbs ml-auto">
                                <ul class="list-unstyled">
                                    <li><a href="index.php">ホーム</a></li>
                                    <li>参加イベント</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="events">
        <div class="container">
            <h3>参加イベント</h3>
            <div class="row attend_event border-bottom">
                <div class="col">
                    <?php foreach ($attend_events as $event): ?>
                        <div class="event mb-4">
                            <div class="row row-lg-eq-height">
                                <div class="col-lg-3 event_col">
                                    <div class="event_image_container">
                                        <a href="#" class="background_image"
                                            style="background-image:url(<?= $event['image_path'] ?>)">
                                        </a>
                                        <div class="date_container">
                                            <a href="<?= $event['event_url']; ?>">
                                                <span
                                                    class="date_content d-flex flex-column align-items-center justify-content-center">
                                                    <div class="date_month">
                                                        <?= date("m", strtotime($event['event_date'])); ?>月
                                                    </div>
                                                    <div class="date_day">
                                                        <?= date("d", strtotime($event['event_date'])); ?>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 event_col">
                                    <div class="event_content">
                                        <div class="event_title">
                                            <?= $event['event_name'] ?>
                                        </div>
                                        <div class="event_location">@
                                            <?= $event['event_venue'] ?>
                                        </div>
                                        <div class="event_text">
                                            <p>
                                                <?= $event['content'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php 
                    if(empty($attend_events)){
                        echo '<h4 class="text-center">表示するイベントはありません。</h4>';
                    }
                    ?>
                </div>
            </div>
            <h3 class="mt-5">終了イベント</h3>
            <div class="row end_event">
                <div class="col">
                    <?php foreach ($old_events as $event): ?>
                        <div class="event mb-4">
                            <div class="row row-lg-eq-height">
                                <div class="col-lg-3 event_col">
                                    <div class="event_image_container">
                                        <a href="#" class="background_image"
                                            style="background-image:url(<?= $event['image_path'] ?>)">
                                        </a>
                                        <div class="date_container">
                                            <a href="<?= $event['event_url']; ?>">
                                                <span
                                                    class="date_content d-flex flex-column align-items-center justify-content-center">
                                                    <div class="date_month">
                                                        <?= date("m", strtotime($event['event_date'])); ?>月
                                                    </div>
                                                    <div class="date_day">
                                                        <?= date("d", strtotime($event['event_date'])); ?>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 event_col">
                                    <div class="event_content">
                                        <div class="event_title">
                                            <?= $event['event_name'] ?>
                                        </div>
                                        <div class="event_location">@
                                            <?= $event['event_venue'] ?>
                                        </div>
                                        <div class="event_text">
                                            <p>
                                                <?= $event['content'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php 
                    if(empty($old_events)){
                        echo '<h4 class="text-center">表示するイベントはありません。</h4>';
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                    <div class="pagination">
                        <ul>
                            <li class="active"><a href="#">01.</a></li>
                            <li><a href="#">02.</a></li>
                            <li><a href="#">03.</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script src="public/js/attender/attender.js"></script>