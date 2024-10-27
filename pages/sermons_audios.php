<?php
require_once('../database/db.php');

if (isset($_GET['sermon_id'])) {
    $sermon_id = $_GET['sermon_id'];
    $stmt = $db->prepare("SELECT audio, title FROM sermons WHERE sermon_id = ?");
    $stmt->execute([$sermon_id]);
    $sermon = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$sermon || empty($sermon['audio'])) {
        echo "<p>Audio non disponible pour ce sermon.</p>";
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
    <title><?php echo htmlspecialchars($sermon['title']); ?> - Audio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="icon" href="../asset/images/church_logo.png" type="image/png" sizes="16x16">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .audio-container {
            background-color: #2c3e50;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #ecf0f1;
            margin-bottom: 20px;
        }

        .audio-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            background-color: #34495e;
            padding: 10px;
            border-radius: 8px;
        }

        .control-btn {
            cursor: pointer;
            color: #ecf0f1;
            font-size: 24px;
        }

        .progress-bar {
            width: 100%;
            height: 5px;
            background-color: #7f8c8d;
            border-radius: 5px;
            margin: 0 10px;
            position: relative;
            cursor: pointer;
        }

        .progress-filled {
            background-color: #f39c12;
            height: 100%;
            width: 0;
            border-radius: 5px;
        }

        .volume-control input[type="range"] {
            width: 100px;
        }

        .time-info {
            font-size: 14px;
            color: #bdc3c7;
        }
    </style>
</head>
<body>
    <div class="audio-container">
        <h2><?php echo htmlspecialchars($sermon['title']); ?></h2>

        <!-- Custom Audio Controls -->
        <div class="audio-controls">
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

            <!-- Time Info -->
            <div class="time-info">
                <span id="currentTime">0:00</span> / <span id="totalTime">0:00</span>
            </div>
        </div>
    </div>

    <audio id="audioPlayer">
        <source src="sermons/audio/<?php echo htmlspecialchars($sermon['audio']); ?>" >
        Votre navigateur ne supporte pas la lecture de cet audio.
    </audio>

    <script>
        const audio = document.getElementById('audioPlayer');
        const playPauseBtn = document.getElementById('playPauseBtn');
        const progressBar = document.getElementById('progressBar');
        const progressFilled = document.getElementById('progressFilled');
        const volumeControl = document.getElementById('volumeControl');
        const currentTimeDisplay = document.getElementById('currentTime');
        const totalTimeDisplay = document.getElementById('totalTime');

        // Play/Pause functionality
        playPauseBtn.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                playPauseBtn.className = 'bi bi-pause-fill';
            } else {
                audio.pause();
                playPauseBtn.className = 'bi bi-play-fill';
            }
        });

        // Update progress bar and time
        audio.addEventListener('timeupdate', () => {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressFilled.style.width = progress + '%';

            // Update time display
            currentTimeDisplay.textContent = formatTime(audio.currentTime);
            totalTimeDisplay.textContent = formatTime(audio.duration);
        });

        // Seek functionality (Click on progress bar to seek)
        progressBar.addEventListener('click', (e) => {
            const clickX = e.offsetX;
            const width = progressBar.offsetWidth;
            const newTime = (clickX / width) * audio.duration;
            audio.currentTime = newTime;
        });

        // Volume control
        volumeControl.addEventListener('input', () => {
            audio.volume = volumeControl.value;
        });

        // Helper function to format time
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return minutes + ':' + (secs < 10 ? '0' : '') + secs;
        }
    </script>
</body>
</html>
