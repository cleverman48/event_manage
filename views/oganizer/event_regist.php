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
                            <label for="eventDateTime"
                                class="col-12 col-sm-3 col-form-label text-sm-right">開催日時:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="datetime" name="eventDateTime" id="eventDateTime"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eventName" class="col-12 col-sm-3 col-form-label text-sm-right">イベント名:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="eventName" id="eventName" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-12 col-sm-3 col-form-label text-sm-right">開催場所:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="venue" id="venue" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-12 col-sm-3 col-form-label text-sm-right">住所:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-12 col-sm-3 col-form-label text-sm-right">URL:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="url" name="url" id="url" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="participationFee"
                                class="col-12 col-sm-3 col-form-label text-sm-right">参加費:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" name="participationFee" id="participationFee" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numParticipants"
                                class="col-12 col-sm-3 col-form-label text-sm-right">人数:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" max="500" name="numParticipants" id="numParticipants" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matchingRestrictions"
                                class="col-12 col-sm-3 col-form-label text-sm-right">マッチング制限:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" min="1" max="5" list="options" name="matchingRestrictions"
                                    id="matchingRestrictions" class="form-control" required>
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
                                <select class="js-example-basic-multiple" class="form-control" multiple="multiple">
                                    <option value="人材開発">人材開発</option>
                                    <option value="法務">法務</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-12 col-sm-3 col-form-label text-sm-right">画像挿入:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="file" name="image" id="image" class="form-control-file possibleChange"
                                    accept="image/*">
                                <div style="max-width: max-content;" class="mx-auto mt-4">
                                    <img id="imagePreview" src="" alt="画像プレビュー"
                                        style="height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-12 col-sm-3 col-form-label text-sm-right">内容:</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="content" id="content" cols="30" rows="10"
                                    class="form-control possibleChange"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary m-3">新規登録</button>
                        <button class="btn btn-dark m-3" onclick="go_eventlist()">閉じる</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/vendor/select2/js/select2.min.js"></script>
<script src="assets/vendor/summernote/js/summernote-bs4.js"></script>
<script src="assets/vendor/datetimepicker/jquery.datetimepicker.full.min.js"></script>
<script src="public/js/oganizer/event_regist.js"></script>
<script>
     $(document).ready(function() {
        $('#eventDateTime').datetimepicker({
            format: 'Y-m-d H:i',
            step: 5,
            lang: 'ch'
        });
    });
</script>