Vue.directive("tap", {
  bind: function(el, binding) {
    var startTx, startTy, endTx, endTy, startTime, endTime;

    el.addEventListener(
      "touchstart",
      function(e) {
        var touch = e.touches[0];
        startTx = touch.clientX;
        startTy = touch.clientY;
        startTime = +new Date();
      },
      false
    );

    el.addEventListener(
      "touchend",
      function(e) {
        endTime = +new Date();
        if (endTime - startTime > 300) {
          // 若点击事件过长，不执行回调
          return;
        }
        var touch = e.changedTouches[0];
        endTx = touch.clientX;
        endTy = touch.clientY;
        if (Math.abs(startTx - endTx) < 6 && Math.abs(startTy - endTy) < 6) {
          // 若点击期间手机移动距离过长，不执行回调
          var method = binding.value.method;
          var params = binding.value.params;
          method(params);
        }
      },
      false
    );
  }
});
var vm = new Vue({
  el: "#app", //限定作用域
  data: {
    some: "ok!",
    liParams: [],
    timer: null,
    score: 0,
    gameTime: 6000, //游戏设定时间
    giftbornT: 500, //产生礼物的频率
    a: 0,
    ok: true,
    gameFlag: false, //游戏是否结束状态
    duration: 10000, // 定义时间
    gift: [
      "htwd_01.png",
      "htwd_02.png",
      "htwd_03.png",
      "htwd_04.png",
      "htwd_05.png",
      "htwd_06.png",
      "htwd_07.png",
      "htwd_08.png",
      "htwd_09.png",
      "htwd_10.png",
      "htwd_11.png",
      "htwd_12.png"
    ]
  },
  mounted: function() {
    //页面加载之后自动调用，常用于页面渲染
    this.$nextTick(function() {
      ion.sound({
        sounds: [
          {
            name: "bgm_1",
            loop: false
          }
        ],
        volume: 0.5,
        path: "http://ojcokbt6a.bkt.clouddn.com/", // my test URL
        preload: true,
        multiplay: false,
        // 保证音频加载完成
        ready_callback: () => {
          console.log("音乐加载完成");
        }
      });
      //在2.0版本中，加mounted的$nextTick方法，才能使用vm
      this.createDom();
    });
  },
  methods: {
    /**
     * 开启动画
     */
    startRedPacket() {
      var win =
        document.documentElement.clientWidth || document.body.clientWidth;
      var imgLn = this.gift.length - 1;
      var left = parseInt(Math.random() * (win - 100) + 0);
      var gift = this.gift[Math.floor(Math.random() * imgLn)];
      var rotate = parseInt(Math.random() * (45 - -45) - 45) + "deg"; // 旋转角度
      var scales = (Math.random() * (12 - 10 + 1) + 10) * 0.1; // 图片尺寸
      var durTime = Math.random() * (2.5 - 2.2 + 1) + 2.2 + "s"; // 时间  1.2和1.2这个数值保持一样
      var score1 = scales > 1.1 ? 1 : 2;
      var score2 = durTime > 2 ? 1 : 2;
      var scoreLast = score1 + score2;
      this.liParams.push({
        left: left + "px",
        cls: "move_1",
        // transforms: "rotate(" + rotate + ") scale(" + scales + ")",
        transforms: "scale(" + scales + ")",
        img: "images/" + gift,
        durTime: durTime,
        score: scoreLast,
        scoreShow: false
      });
    },
    createDom() {
      var _this = this;
      timer = setInterval(function() {
        _this.startRedPacket();
      }, _this.giftbornT);
      setTimeout(function() {
        _this.gameFlag = true;
        console.log("gameOver");
      }, 6000);
    },
    /**
     * 回收dom节点
     */
    removeDom(e) {
      giftTotal = this.gameTime / this.giftbornT;
      var target = e.currentTarget;
      document.querySelector("#red_packet").removeChild(target);
      this.a++;
      // if (this.a == giftTotal) {
      //   this.gameFlag = true;
      // }
    },
    getMoney(e, score) {
      var flag = this.gameFlag;
      if (!flag) {
        var _this = this;
        var timer = 0;
        var li = e;
        var sc = score;
        var currentTarget = e.currentTarget;
        currentTarget.classList.add("active");
        // _this.removeDom(li);
        this.score += sc;
      }
    },
    gameOver() {
      this.createDom();
    },
    test: function(ee) {
      console.log(ee);
    }
  }
});
