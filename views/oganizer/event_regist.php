<link rel="stylesheet" href="public/css/oganizer/event_regist.css">
<div class="top-board">
    <div class="container">
        <div class="card p-5 d-flex justify-content-center  align-items-center w-60"
        style="background-color:#d3e4ed;">
            <form id="eventForm">
                <div class="align-labels">
                    <label for="eventDateTime" class="form-label">開催日時:</label>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control" id="eventDateTime" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="eventName" class="form-label">イベント名:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="eventName" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="venue" class="form-label">開催場所:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="venue" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="address" class="form-label">住所:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="url" class="form-label">URL:</label>
                    <div class="form-group">
                        <input type="url" class="form-control" id="url" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="participationFee" class="form-label">参加費:</label>
                    <div class="form-group">
                        <input type="number" class="form-control" id="participationFee" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="numParticipants" class="form-label">人数:</label>
                    <div class="form-group">
                        <input type="number" class="form-control" id="numParticipants" required>
                    </div>
                </div>

                <div class="align-labels">
                    <label for="matchingRestrictions" class="form-label">マッチング制限:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="matchingRestrictions">
                    </div>
                </div>
                <div class="tag-container" id="tagContainer"></div>
                <div class="align-labels">
                    <label for="tag" class="form-label">タグ:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tag">
                    </div>
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
                        <textarea class="form-control" id="content" rows="4" required></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end  align-items-center">
                    <button type="submit" class="btn btn-primary m-3">新規登録</button>
                    <button  class="btn btn-dark m-3" onclick="go_eventlist()">閉じる</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/js/oganizer/event_regist.js"></script>