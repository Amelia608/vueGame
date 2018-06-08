var l = 90;
var Images = new Array(l);
var ImgLoaded = 0;
var winW, winH, ani1, ani2, ani3;
// var Media = new Audio();
// Media.src = "http://ojcokbt6a.bkt.clouddn.com/bgm_1.mp3";
// Media.setAttribute("loop", true);
// Media.play();
$(function() {
  LoadImgs();
  // play_animation(0, 41, "c-1", ani1);
  // play_animation(41, 85, "c-2", ani2);
  $("#c-2").click(function() {
    $(".page2").hide();
    play_animation(47, 89, "c-3", ani3, false, callback3);
  });
});
function play_animation(n1, n2, block, aniName, loop, callback) {
  var framesUrl = [];
  for (var i = n1; i < n2; i++) {
    // framesUrl.push("http://p9hhmaiyc.bkt.clouddn.com/lh_" + i + ".png");
    framesUrl.push("images/lh_" + i + ".png");
  }
  // frame animation
  aniName = new frame_ani({
    canvasTargetId: block, // target canvas ID
    framesUrl: framesUrl, // frames url
    loop: loop, // if loop
    height: 550, // source image's height (px)
    width: 320, // source image's width (px)
    frequency: 20, // count of frames in one second
    audioIonName: "bgm_1", // ion.sound audio name
    onComplete: function() {
      if (callback) {
        callback();
      }
      // console.log("Animation loop.");
    }
  });

  // preload & play
  aniName.initialize(function() {
    aniName.play();
  });
}

//设置加载队列
function LoadImgs() {
  for (var i = 0; i < Images.length; i++) {
    Images[i] = new Image();
    downloadImage(i);
  }
}

//加载单个图片文件
function downloadImage(i) {
  var imageIndex = i; //图片以1开始
  Images[i].src = "images/lh_" + imageIndex + ".png";
  Images[i].onLoad = validateImages(i);
}

//验证是否成功加载完成，如不成功则重新加载
function validateImages(i) {
  if (!Images[i].complete) {
    window.setTimeout("downloadImage(" + i + ")", 200);
  } else if (
    typeof Images[i].naturalWidth != "undefined" &&
    Images[i].naturalWidth == 0
  ) {
    window.setTimeout("downloadImage(" + i + ")", 200);
  } else {
    ImgLoaded++;
    if (ImgLoaded == l) {
      //						alert('图片加载完毕！');
      $("#loading")
        .hide()
        .addClass("hasload");
      // play_animation(0, 41, "c-1");
      play_animation(0, 14, "c-1", ani1, false, callback1);
    }
  }
}

function callback1() {
  // console.log(1);
  $(".page1").hide();
  play_animation(14, 47, "c-2", ani2, true);
}
function callback2() {
  $(".page2").hide();
  play_animation(47, 89, "c-3", ani3, false, callback3);
}
function callback3() {
  window.location.href = "game.html";
}
