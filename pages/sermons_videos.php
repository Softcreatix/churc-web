<?php
require_once('../database/db.php');

if (isset($_GET['sermon_id'])) {
    $sermon_id = $_GET['sermon_id'];
    $stmt = $db->prepare("SELECT video, title FROM sermons WHERE sermon_id = ?");
    $stmt->execute([$sermon_id]);
    $sermon = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$sermon || empty($sermon['video'])) {
        echo "<p>Vidéo non disponible pour ce sermon.</p>";
        exit;
    }
} else {
    echo "<p>ID de sermon invalide.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($sermon['title']); ?> - Vidéo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asset/css/video_sermon.css">
    <link rel="icon" href="../asset/images/church_logo.png" type="image/png" sizes="16x16">
    
</head>
<body>
    <div class="video-container" >
        <h2><?php echo htmlspecialchars($sermon['title']); ?></h2>

        <!-- Video element -->
        <video id="videoPlayer" width="100%">
            <source src="sermons/videos/<?php echo htmlspecialchars($sermon['video']); ?>" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de cette vidéo.
        </video>

        <!-- Custom Controls -->
        <div class="video-controls">
            <div class="control-btn play-pause-btn">
                <i id="playPauseBtn" class="bi bi-play-fill"></i>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar" id="progressBar">
                <div class="progress-filled" id="progressFilled"></div>
            </div>

            <!-- Volume Control -->
            <div class="volume-control">
                <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="0.5">
            </div>

            <!-- Fullscreen Button -->
            <div class="control-btn fullscreen-btn">
                <i id="fullscreenBtn" class="bi bi-arrows-fullscreen"></i>
            </div>

            <!-- Time Info -->
            <div class="time-info">
                <span id="currentTime">0:00</span> / <span id="totalTime">0:00</span>
            </div>
        </div>
    </div>

    <script>
        const video = document.getElementById('videoPlayer');
        const playPauseBtn = document.getElementById('playPauseBtn');
        const progressBar = document.getElementById('progressBar');
        const progressFilled = document.getElementById('progressFilled');
        const volumeControl = document.getElementById('volumeControl');
        const currentTimeDisplay = document.getElementById('currentTime');
        const totalTimeDisplay = document.getElementById('totalTime');
        const fullscreenBtn = document.getElementById('fullscreenBtn');

        // Play/Pause functionality
        playPauseBtn.addEventListener('click', () => {
            if (video.paused) {
                video.play();
                playPauseBtn.className = 'bi bi-pause-fill';
            } else {
                video.pause();
                playPauseBtn.className = 'bi bi-play-fill';
            }
        });

        // Update progress bar and time
        video.addEventListener('timeupdate', () => {
            const progress = (video.currentTime / video.duration) * 100;
            progressFilled.style.width = progress + '%';

            // Update time display
            currentTimeDisplay.textContent = formatTime(video.currentTime);
            totalTimeDisplay.textContent = formatTime(video.duration);
        });

        // Volume control
        volumeControl.addEventListener('input', () => {
            video.volume = volumeControl.value;
        });

        // Fullscreen functionality
        fullscreenBtn.addEventListener('click', () => {
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.webkitRequestFullscreen) { // For Safari
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) { // For IE/Edge
                video.msRequestFullscreen();
            }
        });

        // Helper function to format time
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return minutes + ':' + (secs < 10 ? '0' : '') + secs;
        }

        // Seek functionality (Click on progress bar to seek)
            progressBar.addEventListener('click', (e) => {
                const clickX = e.offsetX;
                const width = progressBar.offsetWidth;
                const newTime = (clickX / width) * video.duration;
                video.currentTime = newTime;
            });

    </script>
</body>
</html>
