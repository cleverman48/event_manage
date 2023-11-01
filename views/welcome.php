<div class="dashboard-wrapper mx-auto mt-2">
    <input type="hidden" id="user_id" value="<?php echo isset($_SESSION['login_user']) ? $_SESSION['login_user'] : 0; ?>">
    <div class="w-100 dashboard-img position-relative">
        <img class="w-100 h-100" src="public/image/back.jpg" alt="">
        <div class="position-absolute w-100" style="bottom: 130px;">
            <div class="container mx-auto">
                <div class="row">
                    <div class="col">
                        <div class="home_content d-flex flex-row align-items-end justify-content-center">
                            <div class="current_page text-center">ホームページへようこそ。</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php foreach ($events as $event): ?>
                        <div class="event">
                            <div class="row row-lg-eq-height">
                                <div class="col-lg-6 event_col">
                                    <div class="event_image_container">
                                        <div class="background_image"
                                            style="background-image:url(<?= $event['image_path'] ?>)">
                                        </div>
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
                                <div class="col-lg-6 event_col">
                                    <div class="event_content">
                                        <div class="event_title">
                                            <?= $event['event_name'] ?>
                                        </div>
                                        <div class="event_location">@
                                            <?= $event['event_venue'] ?>
                                        </div>
                                        <div class="row mt-2 align-items-center">
                                            <div class="col-8 event_tag">
                                                <?php foreach (explode(",", $event['tags']) as $tag): ?>
                                                    <span class="badge badge-info">
                                                        <?= $tag ?>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="col-4 event_share text-center">
                                                <button id="add_favorite[<?= $event['id'] ?>]"
                                                    onclick="add_favorite(<?= $event['id'] ?>)"
                                                    class="btn btn-light p-1 mr-1 <?php echo (isFavoriteExists((isset($_SESSION['login_user'])) ? $_SESSION['login_user'] : 0, $event['id']) == 1) ? 'fas text-danger' : 'far'; ?> fa-heart"></button>
                                                <button id="event_share[<?= $event['id'] ?>]"
                                                    onclick="event_share(<?= $event['id'] ?>)"
                                                    class="btn btn-light p-1 far fa-share-square"></button>
                                            </div>
                                        </div>
                                        <div class="event_text">
                                            <p>
                                                <?= $event['content'] ?>
                                            </p>
                                        </div>
                                        <div class="event_speakers">
                                            <?php
                                            $organizer = find($users, ['userID' => $event['event_oganizer']]);
                                            ?>

                                            <a href="#"
                                                class="event_speaker d-flex flex-row align-items-center justify-content-start">
                                                <div>
                                                    <div class="event_speaker_image"><img
                                                            src="<?php echo $organizer['avatar']; ?>" alt></div>
                                                </div>
                                                <div class="event_speaker_content">
                                                    <div class="event_speaker_name">
                                                        <?php echo $organizer['lastname'] . ' ' . $organizer['firstname']; ?>
                                                    </div>
                                                    <div class="event_speaker_title">
                                                        <?php echo $organizer['company']; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="event_buttons">
                                            <?php if (isPartIn((isset($_SESSION['login_user'])) ? $_SESSION['login_user'] : 0, $event['id']) == 0): ?>
                                                <a href="index.php?action=attendEvent&event=<?php echo $event['id']; ?>"
                                                    class="event_button event_button_1 btn btn-primary">参加する!</a>
                                                <a class="btn btn-warning event_button event_button_2" data-toggle="modal"
                                                    data-target="#attendListModal">参加者一覧</a>
                                            <?php else: ?>
                                                <a href="#" class="event_button event_button_1 btn btn-light">参加しました!</a>
                                                <a class="btn btn-warning event_button event_button_2"
                                                    href="index.php?action=attender_list&event=<?php echo $event['id'] ;?>">参加者一覧</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php
                    if (empty($events)) {
                        echo '<h4 class="text-center">表示するイベントはありません。</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="attendListModal" tabindex="-1" role="dialog"
    aria-labelledby="attendListModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="updateNoti">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendListModalLabel">アラート!</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p class="text-center">イベントに参加してこそ閲覧できます。</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" data-dismiss="modal">確認</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="public/js/attender/attender.js"></script>