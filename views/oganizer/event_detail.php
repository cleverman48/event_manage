<link rel="stylesheet" href="assets/vendor/select2/css/select2.css">
<link href="assets/vendor/summernote/css/summernote-bs4.css" rel="stylesheet" />
<div class="dashboard-wrapper mt-1">
    <div class="container-fluid dashboard-content col-lg-10 col-md-12 mx-auto">
        <div class="row"></div>
        <div class="card main-center px-3 py-3">
            <div class="card-header px-0 py-0">
                <h5 class="mb-0">イベント登録</h5>
            </div>
            <div class="card-body">
                <form id="eventForm">
                    <div class="">
                        <div class="form-group row">
                            <label for="event_id" class="col-12 col-sm-3 col-form-label text-sm-right">イベントID:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" value="<?php echo $event['event_id']; ?>" class="form-control"
                                    disabled>
                                <input type="hidden" name="eventID" id="eventID"
                                    value="<?php echo $event['event_id']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventDateTime"
                                class="col-12 col-sm-3 col-form-label text-sm-right">開催日時:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="datetime-local"
                                    value="<?php echo $event['event_date'] . "T" . $event['event_time']; ?>"
                                    name="eventDateTime" id="eventDateTime" class="form-control possibleChange" disabled
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="eventName" class="col-12 col-sm-3 col-form-label text-sm-right">イベント名:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" value="<?php echo $event['event_name']; ?>" name="eventName"
                                    id="eventName" class="form-control possibleChange" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-12 col-sm-3 col-form-label text-sm-right">開催場所:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" value="<?php echo $event['event_venue']; ?>" name="venue" id="venue"
                                    class="form-control possibleChange" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-12 col-sm-3 col-form-label text-sm-right">住所:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" value="<?php echo $event['event_address']; ?>" name="address"
                                    id="address" class="form-control possibleChange" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-12 col-sm-3 col-form-label text-sm-right">URL:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="url" value="<?php echo $event['event_url']; ?>" name="url" id="url"
                                    class="form-control possibleChange" disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="participationFee"
                                class="col-12 col-sm-3 col-form-label text-sm-right">参加費:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" value="<?php echo $event['participation_fee']; ?>"
                                    name="participationFee" id="participationFee" class="form-control possibleChange"
                                    disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numParticipants"
                                class="col-12 col-sm-3 col-form-label text-sm-right">人数:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" value="<?php echo $event['num_participants']; ?>"
                                    name="numParticipants" max="500" id="numParticipants" class="form-control possibleChange"
                                    disabled required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matchingRestrictions"
                                class="col-12 col-sm-3 col-form-label text-sm-right">マッチング制限:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" value="<?php echo $event['matching_restrictions']; ?>" min="1"
                                    max="5" list="options" name="matchingRestrictions" id="matchingRestrictions"
                                    class="form-control possibleChange" disabled required>
                                <datalist id="options">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                    <option value="5"></option>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">タグ:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select class="js-example-basic-multiple form-control possibleChange"
                                    multiple="multiple" disabled>
                                    <?php foreach (explode(",", $event['tags']) as $tag): ?>
                                        <option value="<?= $tag ?>" selected>
                                            <?= $tag ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-12 col-sm-3 col-form-label text-sm-right">画像挿入:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="file" name="image" id="image" class="form-control-file possibleChange"
                                    accept="image/*" disabled>
                                <div style="max-width: max-content;" class="mx-auto mt-4">
                                    <img id="imagePreview" src="<?php echo $event['image_path']; ?>" alt="画像プレビュー"
                                        style="max-width: 200px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-12 col-sm-3 col-form-label text-sm-right">内容:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="content" id="content" cols="30" rows="10"
                                    class="form-control possibleChange"
                                    disabled><?php echo $event['content']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="attender_url" class="col-12 col-sm-3 col-form-label text-sm-right">イベント詳細ページ:</label>
                        <div class="col-8 col-sm-8 col-lg-6">
                            <div class="row">
                                <input type="text" value="<?php echo $event['event_url']; ?>" name="attender_url"
                                    id="attender_url" class="form-control col-lg-9 ml-3" disabled>
                                <button class="btn btn-success col-lg-2 ml-4" id="copy">コピー</button>
                            </div>
                        </div>
                    </div>
                    <p id="copy-feedback" class="text-center text-danger" style="display: none;">コピーしました！</p>
                    <div class="align-labels d-flex justify-content-end  align-items-center">
                    </div>
                    <div class="d-flex justify-content-center  align-items-center flex-wrap mb-4">
                        <button class="btn btn-secondary mr-1 mb-2">参加者限定ペイジ</button>
                        <button type="button" id="changeButton" class="btn btn-light mb-2">変更</button>
                        <button type="submit" id="updateButton" class="btn btn-primary mb-2">保存</button>
                        <button class="btn btn-dark ml-1 mb-2" onclick="go_eventlist()">閉じる</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendor/select2/js/select2.min.js"></script>
<script src="assets/vendor/summernote/js/summernote-bs4.js"></script>
<script src="assets/vendor/datetimepicker/jquery.datetimepicker.full.min.js"></script>
<script src="public/js/oganizer/event_detail.js"></script>
<script>
     $(document).ready(function() {
        $('#eventDateTime').datetimepicker({
            format: 'Y-m-d H:i',
            step: 5,
            lang: 'ch'
        });
    });
</script>