function play_animation() {
  var framesUrl = [];
  for (let i = 0; i < 60; i++) {
    framesUrl.push("http://p9hhmaiyc.bkt.clouddn.com/lh_" + i + ".png");
    // framesUrl.push("images/lh_" + i + ".png");
  }
  // frame animation
  var ani = new frame_ani({
    canvasTargetId: "c-1", // target canvas ID
    framesUrl: framesUrl, // frames url
    loop: true, // if loop
    height: 550, // source image's height (px)
    width: 320, // source image's width (px)
    frequency: 20, // count of frames in one second
    audioIonName: "bgm_1", // ion.sound audio name
    onComplete: function() {
      // complete callback
      // console.log("Animation loop.");
    }
  });

  // preload & play
  ani.initialize(() => {
    $("#loading")
      .hide()
      .addClass("hasload");
    ani.play();
  });
}
play_animation();

// 背景音乐
// $(document).ready(() => {
//   // ion.sound BGM
//   ion.sound({
//     sounds: [
//       {
//         name: "bgm_1",
//         loop: false
//       }
//     ],
//     volume: 0.5,
//     path: "http://ojcokbt6a.bkt.clouddn.com/", // my test URL
//     preload: true,
//     multiplay: false,
//     // 保证音频加载完成
//     ready_callback: () => {
//       play_animation();
//     }
//   });
// });
