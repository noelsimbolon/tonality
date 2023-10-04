<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/public/js/FormDetail.js"></script>
    <link rel="stylesheet" href="/public/css/FormDetail.css" type="text/css">
    <!-- <link href="/public/assets/fonts" rel="stylesheet"> -->
    <title>Form</title>
</head>
<body>
    <div class="form-container">
        <h1>Edit Song</h1>
        <form class="form-list">
            <div class="song-quest">
                <div class="form-label">Album Name</div>
                    <input type="text">
            </div>
            <div class="song-quest">
                <div class="form-label">Artist</div>
                    <input type="text">
            </div>
            <div class="song-quest">
                <div class="form-label">Genre</div>
                    <input type="text">
            </div>
            <div class="song-quest">
                <div class="form-label">Release Date</div>
                    <input type="date" value="2001-01-01">
            </div>
            <div class="song-quest">
                <div class="form-label">Audio File</div>
                    <input type="file" id="input-file" accept="audio/*">
                    <label for="input-file" class="custom-file-upload" id="file-label">Choose An Audio File</label>
            </div>
            <div class="song-quest">
                <div class="form-label">Album</div>
                    <input type="text">
            </div>
            <div class="cancel-submit">
                <button class="cancel-btn">Cancel</button>
                <button class="add-btn">Add Song</button>
            </div>
        </form>
    </div>
</body>
</html>