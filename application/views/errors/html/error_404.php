<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

* {
	margin: 0;padding: 0;
}

@import url(https://fonts.googleapis.com/css?family=Fjalla+One);
@-webkit-keyframes rotate {
  25% {
    -webkit-transform: rotate(-28deg);
    -ms-transform: rotate(-28deg);
    transform: rotate(-28deg);
  }
  75% {
    -webkit-transform: rotate(28deg);
    -ms-transform: rotate(28deg);
    transform: rotate(28deg);
  }
}
@-moz-keyframes rotate {
  25% {
    -webkit-transform: rotate(-28deg);
    -ms-transform: rotate(-28deg);
    transform: rotate(-28deg);
  }
  75% {
    -webkit-transform: rotate(28deg);
    -ms-transform: rotate(28deg);
    transform: rotate(28deg);
  }
}
@-o-keyframes rotate {
  25% {
    -webkit-transform: rotate(-28deg);
    -ms-transform: rotate(-28deg);
    transform: rotate(-28deg);
  }
  75% {
    -webkit-transform: rotate(28deg);
    -ms-transform: rotate(28deg);
    transform: rotate(28deg);
  }
}
@keyframes rotate {
  25% {
    -webkit-transform: rotate(-28deg);
    -ms-transform: rotate(-28deg);
    transform: rotate(-28deg);
  }
  75% {
    -webkit-transform: rotate(28deg);
    -ms-transform: rotate(28deg);
    transform: rotate(28deg);
  }
}
@-webkit-keyframes msg_first {
  0%, 25%, 75.001%, 100% {
    opacity: 1;
  }
  25.001%, 75% {
    opacity: 0;
  }
}
@-moz-keyframes msg_first {
  0%, 25%, 75.001%, 100% {
    opacity: 1;
  }
  25.001%, 75% {
    opacity: 0;
  }
}
@-o-keyframes msg_first {
  0%, 25%, 75.001%, 100% {
    opacity: 1;
  }
  25.001%, 75% {
    opacity: 0;
  }
}
@keyframes msg_first {
  0%, 25%, 75.001%, 100% {
    opacity: 1;
  }
  25.001%, 75% {
    opacity: 0;
  }
}
@-webkit-keyframes msg_second {
  0%, 25%, 75.001%, 100% {
    opacity: 0;
  }
  25.001%, 75% {
    opacity: 1;
  }
}
@-moz-keyframes msg_second {
  0%, 25%, 75.001%, 100% {
    opacity: 0;
  }
  25.001%, 75% {
    opacity: 1;
  }
}
@-o-keyframes msg_second {
  0%, 25%, 75.001%, 100% {
    opacity: 0;
  }
  25.001%, 75% {
    opacity: 1;
  }
}
@keyframes msg_second {
  0%, 25%, 75.001%, 100% {
    opacity: 0;
  }
  25.001%, 75% {
    opacity: 1;
  }
}
body {
  margin: 0;
  overflow: hidden;
  background: #000;
}
body .container {
  position: absolute;
  left: 50%;
  top: 50%;
  width: 36vmin;
  height: 77.94vmin;
  margin-left: -18vmin;
  margin-top: -38.97vmin;
}
body .container:first-child {
  transform-origin: 50% 100%;
  -webkit-animation: rotate 9s infinite linear;
  -moz-animation: rotate 9s infinite linear;
  -o-animation: rotate 9s infinite linear;
  animation: rotate 9s infinite linear;
}
body .container:last-child {
  pointer-events: none;
}
body .container #switch {
  display: none;
}
body .container #switch:checked ~ .ellipse, body .container #switch:checked ~ .ray {
  opacity: 0;
}
body .container .ellipse {
  position: relative;
  width: 36vmin;
  height: 27vmin;
  background: #fffee2;
  border-radius: 50%;
  z-index: 1;
}
body .container .ray {
  position: relative;
  border-top: 36vmin solid #8d8e7e;
  border-left: 11.7vmin solid transparent;
  border-right: 11.7vmin solid transparent;
  margin-top: -12.6vmin;
}
body .container .head {
  position: relative;
  width: 14.4vmin;
  height: 1.8vmin;
  margin-left: 10.8vmin;
  background: #ffab2b;
}
body .container .neck {
  position: relative;
  width: 7.38vmin;
  margin-left: 10.8vmin;
  border-top: 4.32vmin solid #333333;
  border-left: 3.6vmin solid transparent;
  border-right: 3.6vmin solid transparent;
}
body .container .body {
  position: relative;
  width: 7.308vmin;
  margin-left: 14.4vmin;
  height: 21.6vmin;
  background: #646464;
}
body .container label {
  position: absolute;
  top: 3.6vmin;
  left: 2.628vmin;
  width: 1.44vmin;
  height: 3.6vmin;
  border: 0.432vmin solid #333333;
  background: #ffab2b;
  border-radius: 10px;
  cursor: pointer;
}
body .msg {
  position: absolute;
  width: 36vmin;
  margin-left: -18vmin;
  left: 50%;
  text-align: center;
  font-family: 'Fjalla One', sans-serif;
  color: #000;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  z-index: 2;
}
body .msg.msg_1 {
  top: 6.3vmin;
  font-size: 12vmin;
  -webkit-animation: msg_first 9s infinite linear;
  -moz-animation: msg_first 9s infinite linear;
  -o-animation: msg_first 9s infinite linear;
  animation: msg_first 9s infinite linear;
}
body .msg.msg_2 {
  top: 10.8vmin;
  font-size: 4.2vmin;
  -webkit-animation: msg_second 9s infinite linear;
  -moz-animation: msg_second 9s infinite linear;
  -o-animation: msg_second 9s infinite linear;
  animation: msg_second 9s infinite linear;
}

</style>
</head>
<body>
	
	<div class="container">
	  <input type="checkbox" id="switch"/>
	  <div class="ellipse"></div>
	  <div class="ray"></div>
	  <div class="head"></div>
	  <div class="neck"></div>
	  <div class="body">
	    <label for="switch"></label>
	  </div>
	</div>
	<div class="container">
	  <div class="msg msg_1">404</div>
	  <div class="msg msg_2">Halaman yang anda cari ditemukan</div>
	</div>
</body>
</html>