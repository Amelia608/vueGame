var l = 13;
var Images = new Array(l);
var ImgLoaded = 0;
var Media = new Audio();
Media.src = "http://ojcokbt6a.bkt.clouddn.com/bgm_1.mp3";
Media.setAttribute("loop", true);
// Media.addEventListener("canplaythrough", function() {
//   _this.mediaLoad = true;
// });
var vm = new Vue({
  el: "#app", //限定作用域
  data: {
    liParams: [],
    timer: null,
    instructions: false, //游戏说明显示状态
    score: 0,
    progress: 0,
    gameTime: 15000, //游戏设定时间
    giftbornT: 500, //产生礼物的频率
    suceess: false,
    loading: false,
    imgLoad: false, //图片加载完成标志
    mediaLoad: false, //音乐加载完成标志
    sourceLoad: false, //图片音乐资源加载完成标志
    a: 0,
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
      "htwd_12.png",
      "htwd_13.png"
    ]
  },
  mounted: function() {
    //页面加载之后自动调用，常用于页面渲染
    this.$nextTick(function() {
      //在2.0版本中，加mounted的$nextTick方法，才能使用vm
      var _this = this;
      this.LoadImgs();
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
        img: "http://p9hhmaiyc.bkt.clouddn.com/" + gift,
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
      // 开始游戏计时
      setTimeout(function() {
        _this.gameFlag = true;
        if (_this.score >= 50) {
          _this.suceess = true;
        } else {
          _this.suceess = false;
        }
      }, _this.gameTime);

      // 进度条控制
      setInterval(function() {
        _this.progress += 100 / (_this.gameTime / 1000);
        if (_this.progress > 100) {
          _this.progress = 100;
        }
      }, 1000);
    },
    // 回收dom节点
    removeDom(e) {
      giftTotal = this.gameTime / this.giftbornT;
      var target = e.currentTarget;
      document.querySelector("#red_packet").removeChild(target);
      this.a++;
      // if (this.a == giftTotal) {
      //   this.gameFlag = true;
      // }
    },
    // 游戏获取分值
    getMoney(e, score) {
      var flag = this.gameFlag;
      if (!flag) {
        var _this = this;
        var timer = 0;
        var li = e;
        var sc = score;
        var currentTarget = e.currentTarget;
        currentTarget.classList.add("active");
        this.score += sc;
      }
    },
    // 再次挑战游戏
    gameAgain() {
      var _this = this;
      this.gameFlag = false;
      this.suceess = false;
      this.score = 0;
      this.progress = 0;
      setTimeout(function() {
        _this.gameFlag = true;
        console.log("gameOver");
      }, this.gameTime);
    },
    //设置加载队列
    LoadImgs() {
      for (var i = 0; i < Images.length; i++) {
        Images[i] = new Image();
        this.downloadImage(i);
      }
    },
    //加载单个图片文件
    downloadImage(i) {
      var imageIndex = i; //图片以1开始
      Images[i].src =
        "http://p9hhmaiyc.bkt.clouddn.com/" + this.gift[imageIndex];
      Images[i].onLoad = this.validateImages(i);
    },
    // //验证是否成功加载完成，如不成功则重新加载
    validateImages(i) {
      var _this = this;
      if (!Images[i].complete) {
        window.setTimeout(function() {
          _this.downloadImage(i);
        }, 200);
      } else if (
        typeof Images[i].naturalWidth != "undefined" &&
        Images[i].naturalWidth == 0
      ) {
        window.setTimeout(function() {
          _this.downloadImage(i);
        }, 200);
      } else {
        ImgLoaded++;
        if (ImgLoaded == l) {
          _this.imgLoad = true;
          _this.loading = true;
          _this.instructions = true;
          // 一切准备就绪开始游戏
          // this.createDom();
        }
      }
    },
    closeSm() {
      var _this = this;
      _this.instructions = false;
      setTimeout(function() {
        _this.createDom();
        Media.play();
      }, 100);
    }
  }
});
