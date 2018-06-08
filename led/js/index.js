window.onload = function() {
  var loader = document.getElementById("loader");
  loader.style.display = "none";
};
var vm = new Vue({
    el: "#app", //限定作用域
    data: {
      // arr: [0, 0, 0, 0, 0, 0, 0],
      msg: "",
      msgShow: false
    },
    mounted: function() {
      var _this = this;
      //页面加载之后自动调用，常用于页面渲染
      this.$nextTick(function() {
        //在2.0版本中，加mounted的$nextTick方法，才能使用vm
        this.fetchData();
        setInterval(function() {
          _this.fetchData();
        }, 1000);
      });
    },
    methods: {
      // 渲染页面
      fetchData: function() {
        // console.log("票数刷新中...");
        var _this = this;
        this.$http
          .get("../api/led.php")
          .then(function(res) {
            //成功回调
            _this.msg = res.data.info;
            if (res.data.code == "success") {
              _this.arr = res.data.list;
              _this.msgShow = false;
            } else if(res.data.code == "error") {
              _this.msgShow = true;
              setTimeout(() => {
                _this.msgShow = false;
              }, 2000);
            }
          })
      }
    }
  });