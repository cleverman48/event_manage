<link rel="stylesheet" href="public/css/oganizer/event_detail.css">
<div class="top-board">
    <div class="container">
        <div class="card p-5 d-flex justify-content-center  align-items-center w-60" style="background-color:#d3e4ed;">
            <form id="eventForm">
                <div class="align-labels">
                    <label for="eventID" class="form-label">イベントID:</label>
                    <div class="form-group">
                        <input id="eventID" type="text" value="<?php echo $event['event_id']; ?>" class="form-control"
                            disabled>
                    </div>
                </div>
                <div class="align-labels">
                    <label for="eventDateTime" class="form-label">開催日時:</label>
                    <div class="form-group">
                        <input type="datetime-local"
                            value="<?php echo $event['event_date'] . "T" . $event['event_time']; ?>"
                            class="form-control" id="eventDateTime" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="eventName" class="form-label">イベント名:</label>
                    <div class="form-group">
                        <input type="text" value="<?php echo $event['event_name']; ?>" class="form-control"
                            id="eventName" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="venue" class="form-label">開催場所:</label>
                    <div class="form-group">
                        <input type="text" value="<?php echo $event['event_venue']; ?>" class="form-control" id="venue"
                            required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="address" class="form-label">住所:</label>
                    <div class="form-group">
                        <input type="text" value="<?php echo $event['event_address']; ?>" class="form-control"
                            id="address" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="url" class="form-label">URL:</label>
                    <div class="form-group">
                        <input type="url" value="<?php echo $event['event_url']; ?>" class="form-control" id="url"
                            required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="participationFee" class="form-label">参加費:</label>
                    <div class="form-group">
                        <input type="number" value="<?php echo $event['participation_fee']; ?>" class="form-control"
                            id="participationFee" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="numParticipants" class="form-label">人数:</label>
                    <div class="form-group">
                        <input type="number" value="<?php echo $event['num_participants']; ?>" class="form-control"
                            id="numParticipants" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="matchingRestrictions" class="form-label">マッチング制限:</label>
                    <div class="form-group w-100">
                        <input type="number" min="1" max="5" list="options" id="matchingRestrictions"
                            class="form-control" value="<?php echo $event['matching_restrictions']; ?>"
                             required>
                        <datalist id="options">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                        </datalist>                       
                    </div>
                </div>
                <div class="tag-container" id="tagContainer">
                    <?php
                    $tags = explode(",", $event['tags']);
                    foreach ($tags as $tag) {
                        if ($tag != "") {
                            ?>
                            <div class="tag-component">
                                <span class="tag-text">
                                    <?php echo $tag ?>
                                </span>
                                <span class="delete-button" onclick="removeTag(event)">✖</span>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="align-labels">
                    <label for="tag" class="form-label">タグ:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tag">
                    </div>
                </div>
                <div class="align-labels d-flex justify-content-end  align-items-center m-2">
                    <img id="image-input" src="<?php echo $event['image_path']; ?>"
                        alt="<?php echo $event['event_name']; ?>" style="width:40%;">
                </div>
                <div class="align-labels">
                    <label for="image" class="form-label">画像挿入:</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="image" accept="image/*">
                    </div>
                </div>

                <div class="align-labels">
                    <label for="content" class="form-label">内容:</label>
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="4"
                            required><?php echo $event['content']; ?></textarea>
                    </div>
                </div>
                <div class="align-labels d-flex   align-items-center">
                    <label>参加フォームURL:</label>
                    <div class="row  p-1">
                        <div class="col-sm-7 ">
                            <input type="text" value="<?php echo $event['event_url']; ?>" id="attender_url"
                                style="width:120%" disabled>
                        </div>
                        <div class="col-sm-5 ">
                            <button id="copy">コピー</button>
                        </div>
                    </div>
                </div>
                <div class="align-labels d-flex justify-content-end  align-items-center">
                    <p id="copy-feedback" style="display: none;">コピーしました！</p>
                </div>
                <div class="d-flex justify-content-end  align-items-center" style="margin-bottom: 50px;">
                    <button class="btn btn-secondary m-3">参加者限定ペイジ</button>
                    <button type="submit" class="btn btn-primary m-3">変更</button>
                    <button class="btn btn-dark m-3" onclick="go_eventlist()">閉じる</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/js/oganizer/event_detail.js"></script>