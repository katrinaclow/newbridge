<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Newbridge Music</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a062562745.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

{{--Navigation and Intro--}}
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link"
                            style="border: none; background: none; color: #fff; padding: 0 25px; font-size: 12px; font-weight: 600; letter-spacing: .1rem; text-decoration: none; text-transform: uppercase;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}" style="opacity: 0.5;">Register</a>
            @endif
        </div>
    @endif


    <div class="content">
        <div class="bandname m-b-md">
            Newbridge
        </div>
        <div class="links">
            <a href="https://www.instagram.com/newbridgemusic/">Instagram</a>
{{--            <a href="#contact">Spotify</a>--}}
            <a href="https://www.facebook.com/profile.php?id=61563267180532">Faceboook</a>
{{--            <a href="#contact">Twitter</a>--}}
        </div>
    </div>
</div>

{{--Music Player--}}
@if (Auth::check())
    <section id="listen">
        <div id="listen" class="listen content">
            <div class="listen-title">Listen</div>
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
@endif

{{--Bio--}}
<div id="bio" class="bio content">
    <div class="bio-title">Bio</div>
    <div class="bio-content">
        <p>Emerging from the ashes of traditional music, Newbridge is a powerful blend of Americana, folk, and roots-rock
            from Halifax, Nova Scotia. The band features Canadian music veterans Keith Maddison (Maddison Avenue), Glen
            Nicholson (In-Flight Safety), Jeff Mosher (The Mellotones, Matt Andersen), Warren Robert (Myles Goodwyn,
            Pogey), and Robbie Crowell (Sturgill Simpson, Deer Tick, Midland, Matt Mays), each with a wealth of
            experience and a drive to forge their own sound.</p>
        <p>The group’s musical journey led them to Nashville, Tennessee, where they recorded their debut album at the legendary
            Creative Workshops Studio (CWS), co-produced by the talented Robbie Crowell. Built in 1971, CWS has hosted
            legendary recording sessions with Emmylou Harris, Waylon Jennings, the Doobie Brothers, and Rod Stewart and
            was the backdrop to the iconic music documentary film ‘Heartworn Highways’.</p>
        <p>Drawing from diverse influences such as The Band, Van Morrison, The Wallflowers, Tom Petty, and Stan Rogers,
            Newbridge blends folk and country roots with a bluesy rock/R&B feel. Collaborating with Nashville
            heavyweights Laur Joamets (Sturgill Simpson), Cory Younts (Old Crow Medicine Show), Shannon McNally (Dr.
            John, Levon Helm), and Amber Woodhouse (Trigger Hippy), they've crafted a unique range of songs, from
            heartfelt ballads to roll-the-windows-down summer anthems. "We knew early on we had something special,
            something worth pursuing. Once we recorded a few demos, we sent them to our old pal Robbie in Nashville.
            Right away he encouraged us to make the pilgrimage down to Nashville and make a record with him. He was
            really into it. The stars aligned, so how could we say no?” explains Maddison.</p>
        <p>As they gear up to release their debut 10-track LP, Newbridge is poised to make their mark. They aim to
            connect with fans through curated live performances to captivate audiences and build fans for life. You can
            find more information on Newbridge on social and streaming platforms listed below.</p>

    </div>
    <div class="links">
        <a href="www.instagram.com/newbridgemusic">Instagram</a>
{{--        <a href="#contact">Spotify</a>--}}
        <a href="https://www.facebook.com/profile.php?id=61563267180532">Faceboook</a>
{{--        <a href="#contact">Twitter</a>--}}
    </div>
</div>

{{--Contact--}}
<div id="contact" class="contact content">
    <div class="contact-title">Contact Us</div>
    <div class="contact-content">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST"
              class="contact-form bg-transparent shadow-md rounded-lg p-6">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required
                       class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
            <div class="form-group mb-4">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required
                          class="form-input block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"></textarea>
            </div>
            <button type="submit"
                    class="submit-button bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Send Message
            </button>
        </form>
    </div>
</div>



{{--Footer--}}
<section class="bg-transparent">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <div class="flex justify-center mt-8 space-x-6">
            <a href="https://www.facebook.com/profile.php?id=61563267180532" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                          d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="https://www.instagram.com/newbridgemusic/" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                          d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
{{--            <a href="#" class="text-gray-400 hover:text-gray-500">--}}
{{--                <span class="sr-only">Twitter</span>--}}
{{--                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path--}}
{{--                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--            <a href="#" class="text-gray-400 hover:text-gray-500">--}}
{{--                <span class="sr-only">GitHub</span>--}}
{{--                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path fill-rule="evenodd"--}}
{{--                          d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"--}}
{{--                          clip-rule="evenodd"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--            <a href="#" class="text-gray-400 hover:text-gray-500">--}}
{{--                <span class="sr-only">Dribbble</span>--}}
{{--                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path fill-rule="evenodd"--}}
{{--                          d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"--}}
{{--                          clip-rule="evenodd"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
            © Newbridge Music 2024
            <br>
            contact@newbridgemusic.com
        </p>
    </div>
</section>

{{--Music Player Script--}}
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

</body>
</html>
