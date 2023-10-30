<link rel="stylesheet" href="public/css/oganizer/organizer_info.css">
<div class="top-board">
    <div class="pane">
        <form>
            <h3>主催者情報</h3>

            <div class="form-row">
                <label for="organizer">主催者名:</label>
                <input type="text" id="organizer" name="organizer" required>
            </div>

            <div class="form-row">
                <label for="top-image">トップ画像:</label>
                <input type="file" id="top-image" name="top-image">
            </div>

            <div class="form-row">
                <label for="website">ホームページ:</label>
                <input type="url" id="website" name="website">
            </div>

            <div class="form-row">
                <label for="profile">プロフィール:</label>
                <textarea id="profile" name="profile" rows="4"></textarea>
            </div>

            <div class="form-row">
                <input type="submit" value="変更">
            </div>
        </form>
    </div>
</div>