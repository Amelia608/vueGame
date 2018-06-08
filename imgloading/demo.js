function play_animation() {
    var framesUrl = [];
    for (let i = 0; i < 60; i++) {
        framesUrl.push('images/lh_' + i + '.png');
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
        onComplete: function () { // complete callback
            // console.log("Animation loop.");
        },
    });

    // preload & play
    ani.initialize(() => {
        $("#loading").hide();
        ani.play();
    });
}
//play_animation();

// 背景音乐
   $(document).ready(() => {
       // ion.sound BGM
       ion.sound({
           sounds: [
               {
                   name: "bgm_1",
                   loop: false
               },
           ],
           volume: 1,
           path: "http://ojcokbt6a.bkt.clouddn.com/", // my test URL
//         path: "http://p73n69kv5.bkt.clouddn.com/", // my test URL
           preload: true,
           multiplay: false,
           // 保证音频加载完成
           ready_callback: () => {
               play_animation();
           },
           ended_callback: function (obj) {
		       console.log(obj);
		    }
       });
       $(".btn-start").click(function(){
       	console.log("pause");
       	ion.sound.stop("bgm_1");
       	ion.sound.destroy("bgm_1");
       });
   });