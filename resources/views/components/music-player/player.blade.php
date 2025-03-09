<!-- resources/views/components/music-player/player.blade.php -->
@props(['tracks'])

<section id="listen">
    <div id="listen" class="listen content">
        <h2 class="listen-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-6 max-w-full overflow-hidden whitespace-normal">Listen</h2>
        <div class="listen-content">
            <audio id="myAudio" ontimeupdate="onTimeUpdate()">
                <source id="source-audio" src="" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <div class="player-ctn">
                <div class="infos-ctn">
                    <div class="timer">00:00</div>
                    <div class="title"></div>
                    <div class="duration">00:00</div>
                </div>
                <div id="myProgress">
                    <div id="myBar"></div>
                </div>
                <div class="btn-ctn">
                    <div class="btn-action first-btn" onclick="previous()">
                        <div id="btn-faws-back">
                            <i class='fas fa-step-backward'></i>
                        </div>
                    </div>
                    <div class="btn-action" onclick="rewind()">
                        <div id="btn-faws-rewind">
                            <i class='fas fa-backward'></i>
                        </div>
                    </div>
                    <div class="btn-action" onclick="toggleAudio()">
                        <div id="btn-faws-play-pause">
                            <i class='fas fa-play' id="icon-play"></i>
                            <i class='fas fa-pause' id="icon-pause" style="display: none"></i>
                        </div>
                    </div>
                    <div class="btn-play" onclick="forward()">
                        <div id="btn-faws-forward">
                            <i class='fas fa-forward'></i>
                        </div>
                    </div>
                    <div class="btn-action" onclick="next()">
                        <div id="btn-faws-next">
                            <i class='fas fa-step-forward'></i>
                        </div>
                    </div>
                    <div class="btn-mute" id="toggleMute" onclick="toggleMute()">
                        <div id="btn-faws-volume">
                            <i id="icon-vol-up" class='fas fa-volume-up'></i>
                            <i id="icon-vol-mute" class='fas fa-volume-mute' style="display: none"></i>
                        </div>
                    </div>
                </div>
                <div class="playlist-ctn"></div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function createTrackItem(index, name, duration) {
        var trackItem = document.createElement('div');
        trackItem.setAttribute("class", "playlist-track-ctn");
        trackItem.setAttribute("id", "ptc-" + index);
        trackItem.setAttribute("data-index", index);
        document.querySelector(".playlist-ctn").appendChild(trackItem);

        var playBtnItem = document.createElement('div');
        playBtnItem.setAttribute("class", "playlist-btn-play");
        playBtnItem.setAttribute("id", "pbp-" + index);
        document.querySelector("#ptc-" + index).appendChild(playBtnItem);

        var btnImg = document.createElement('i');
        btnImg.setAttribute("class", "fas fa-play");
        btnImg.setAttribute("id", "p-img-" + index);
        document.querySelector("#pbp-" + index).appendChild(btnImg);

        var trackInfoItem = document.createElement('div');
        trackInfoItem.setAttribute("class", "playlist-info-track");
        trackInfoItem.innerHTML = name;
        document.querySelector("#ptc-" + index).appendChild(trackInfoItem);

        var trackDurationItem = document.createElement('div');
        trackDurationItem.setAttribute("class", "playlist-duration");
        trackDurationItem.innerHTML = duration;
        document.querySelector("#ptc-" + index).appendChild(trackDurationItem);
    }

    var listAudio = @json($tracks);

    for (var i = 0; i < listAudio.length; i++) {
        createTrackItem(i, listAudio[i].title, listAudio[i].duration);
    }

    var indexAudio = 0;

    function loadNewTrack(index) {
        var player = document.querySelector('#source-audio');
        player.src = listAudio[index].url;
        document.querySelector('.title').innerHTML = listAudio[index].title;
        this.currentAudio = document.getElementById("myAudio");
        this.currentAudio.load();
        this.toggleAudio();
        this.updateStylePlaylist(this.indexAudio, index);
        this.indexAudio = index;
    }

    var playListItems = document.querySelectorAll(".playlist-track-ctn");

    for (let i = 0; i < playListItems.length; i++) {
        playListItems[i].addEventListener("click", getClickedElement.bind(this));
    }

    function getClickedElement(event) {
        var clickedElement = event.target;
        while (clickedElement && !clickedElement.classList.contains('playlist-track-ctn')) {
            clickedElement = clickedElement.parentElement;
        }
        if (clickedElement) {
            var clickedIndex = clickedElement.getAttribute("data-index");
            if (clickedIndex === this.indexAudio) {
                this.toggleAudio();
            } else {
                loadNewTrack(clickedIndex);
            }
        }
    }

    document.querySelector('#source-audio').src = listAudio[indexAudio].url;
    document.querySelector('.title').innerHTML = listAudio[indexAudio].title;
    document.querySelector('.duration').innerHTML = listAudio[indexAudio].duration;

    var currentAudio = document.getElementById("myAudio");

    currentAudio.load();

    currentAudio.onloadedmetadata = function () {
        document.getElementsByClassName('duration')[0].innerHTML = getMinutes(currentAudio.duration);
    };

    var interval1;

    function toggleAudio() {
        if (this.currentAudio.paused) {
            document.querySelector('#icon-play').style.display = 'none';
            document.querySelector('#icon-pause').style.display = 'block';
            document.querySelector('#ptc-' + this.indexAudio).classList.add("active-track");
            playToPause(this.indexAudio);
            this.currentAudio.play();
        } else {
            document.querySelector('#icon-play').style.display = 'block';
            document.querySelector('#icon-pause').style.display = 'none';
            pauseToPlay(this.indexAudio);
            this.currentAudio.pause();
        }
    }

    function pauseAudio() {
        this.currentAudio.pause();
        clearInterval(interval1);
    }

    var timer = document.getElementsByClassName('timer')[0];
    var barProgress = document.getElementById("myBar");
    var width = 0;

    function onTimeUpdate() {
        var t = this.currentAudio.currentTime;
        timer.innerHTML = getMinutes(t);
        setBarProgress();
        if (this.currentAudio.ended) {
            document.querySelector('#icon-play').style.display = 'block';
            document.querySelector('#icon-pause').style.display = 'none';
            pauseToPlay(this.indexAudio);
            if (this.indexAudio < listAudio.length - 1) {
                var index = parseInt(this.indexAudio) + 1;
                loadNewTrack(index);
            }
        }
    }

    function setBarProgress() {
        var progress = (this.currentAudio.currentTime / this.currentAudio.duration) * 100;
        document.getElementById("myBar").style.width = progress + "%";
    }

    function getMinutes(t) {
        var min = parseInt(t / 60);
        var sec = parseInt(t % 60);
        if (sec < 10) {
            sec = "0" + sec;
        }
        if (min < 10) {
            min = "0" + min;
        }
        return min + ":" + sec;
    }

    var progressbar = document.querySelector('#myProgress');
    progressbar.addEventListener("click", seek.bind(this));

    function seek(event) {
        var percent = event.offsetX / progressbar.offsetWidth;
        this.currentAudio.currentTime = percent * this.currentAudio.duration;
        barProgress.style.width = percent * 100 + "%";
    }

    function forward() {
        this.currentAudio.currentTime = this.currentAudio.currentTime + 5;
        setBarProgress();
    }

    function rewind() {
        this.currentAudio.currentTime = this.currentAudio.currentTime - 5;
        setBarProgress();
    }

    function next() {
        if (this.indexAudio < listAudio.length - 1) {
            var oldIndex = this.indexAudio;
            this.indexAudio++;
            updateStylePlaylist(oldIndex, this.indexAudio);
            loadNewTrack(this.indexAudio);
        }
    }

    function previous() {
        if (this.indexAudio > 0) {
            var oldIndex = this.indexAudio;
            this.indexAudio--;
            updateStylePlaylist(oldIndex, this.indexAudio);
            loadNewTrack(this.indexAudio);
        }
    }

    function updateStylePlaylist(oldIndex, newIndex) {
        document.querySelector('#ptc-' + oldIndex).classList.remove("active-track");
        pauseToPlay(oldIndex);
        document.querySelector('#ptc-' + newIndex).classList.add("active-track");
        playToPause(newIndex);
    }

    function playToPause(index) {
        var ele = document.querySelector('#p-img-' + index);
        ele.classList.remove("fa-play");
        ele.classList.add("fa-pause");
    }

    function pauseToPlay(index) {
        var ele = document.querySelector('#p-img-' + index);
        ele.classList.remove("fa-pause");
        ele.classList.add("fa-play");
    }

    function toggleMute() {
        var btnMute = document.querySelector('#toggleMute');
        var volUp = document.querySelector('#icon-vol-up');
        var volMute = document.querySelector('#icon-vol-mute');
        if (this.currentAudio.muted == false) {
            this.currentAudio.muted = true;
            volUp.style.display = "none";
            volMute.style.display = "block";
        } else {
            this.currentAudio.muted = false;
            volMute.style.display = "none";
            volUp.style.display = "block";
        }
    }
</script>
@endpush