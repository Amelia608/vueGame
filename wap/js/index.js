var loader = document.getElementById("loader");
window.onload = function() {
  // 加载页面控制
  loader.style.display = "none";
};

var vm = new Vue({
  el: "#app", //限定作用域
  data: {
    modShow: false,
    msg: "",
    msgShow: false,
    voteNum: 0,
    des: "",
    desTitle: "",
    curentId: 0,
    success: false,
    infoList: [
      {
        id: 1,
        title: "悬挂"
      },
      {
        id: 2,
        title: "轮胎"
      },
      {
        id: 3,
        title: "排气"
      },
      {
        id: 4,
        title: "刹车"
      },
      {
        id: 5,
        title: "发动机"
      },
      {
        id: 6,
        title: "xDrive"
      }
    ]
  },
  mounted: function() {
    //页面加载之后自动调用，常用于页面渲染
    this.$nextTick(function() {
      //在2.0版本中，加mounted的$nextTick方法，才能使用vm
      //this.fetchData();
    });
  },
  methods: {
    // 渲染页面
    fetchData: function(id) {
      var _this = this,
        voteId = id;
      this.$http.get("../api/wap.php", { id: voteId }).then(function(res) {
        var result = res.data;
        if (result.code == "success") {
          _this.voteNum = result.list;
        } else if (result.code == "error") {
          _this.msg = result.info;
          _this.msgShow = true;
          setTimeout(() => {
            _this.msgShow = false;
          }, 2000);
        }
      });
    },
    modelShow: function(id) {
      var index = id;
      this.curentId = id;
      this.fetchData(id);
      this.des = this.infoList[id - 1].des;
      this.desTitle = this.infoList[id - 1].title;
      this.modShow = true;
    },
    // 提交投票
    vote: function() {
      var _this = this,
        id = this.curentId;
      // console.log(id);
      this.$http
        .post("../api/vote.php", { id: id }, { emulateJSON: true })
        .then(function(res) {
          var result = res.data;
          _this.msg = result.info;
          _this.msgShow = true;
          if (result.code == "success") {
            _this.modShow = false;
            _this.success = true;
            _this.voteNum++;
          }
          setTimeout(function() {
            _this.msgShow = false;
            _this.success = false;
          }, 2500);
        });
    }
  }
});
