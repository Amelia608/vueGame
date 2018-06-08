/**
 * @authors : Hardy (hardy@xiruiad.com)
 * @date    : 2018-01-20
 * @Link    : http://www.xiruiad.com
 */

window.ShearPhoto.MINGGE(function() {
	var b, c, d, e, f, g, h, i, k, l, m, n, p, q, r, s, t, u, v, w, x, y, a = "shearphoto";
	var scriptArgs = document.getElementById('shearphoto').getAttribute('data');
	var strs = new Array();
	strs = scriptArgs.split(" @xirui@ ");
	a = a.replace(/(^\s*)|(\s*$)/g, ""), "" === a || (a += "../../"), b = document.getElementById("relat"), c = b.getElementsByTagName("img"), d = new ShearPhoto, d.config({
		relativeUrl: a,
		traverse: !0,
		translate3d: !1,
		HTML5: !0,
		HTML5MAX: 0,
		HTML5Quality: 1,
		HTML5FilesSize: 50,
		HTML5Effects: !0,
		HTML5ZIP: [1200, 1],
		preview: false,
		url: a + "php/shearphoto.php?ac=" + scriptArgs,
		scopeWidth: 300,
		scopeHeight: 200,
		proportional: [strs[1] / strs[2], strs[1], strs[2]],
		Min: 50,
		Max: 300,
		backgroundColor: "#000",
		backgroundOpacity: .6,
		Border: 0,
		BorderStyle: "solid",
		BorderColor: "#09F",
		relat: b,
		scope: document.getElementById("main"),
		ImgDom: c[0],
		ImgMain: c[1],
		black: document.getElementById("black"),
		form: document.getElementById("smallbox"),
		ZoomDist: document.getElementById("ZoomDist"),
		ZoomBar: document.getElementById("ZoomBar"),
		to: {
			BottomRight: document.getElementById("BottomRight"),
			TopRight: document.getElementById("TopRight"),
			Bottomleft: document.getElementById("Bottomleft"),
			Topleft: document.getElementById("Topleft"),
			Topmiddle: document.getElementById("Topmiddle"),
			leftmiddle: document.getElementById("leftmiddle"),
			Rightmiddle: document.getElementById("Rightmiddle"),
			Bottommiddle: document.getElementById("Bottommiddle")
		},
		Effects: document.getElementById("shearphoto_Effects") || !1,
		DynamicBorder: [document.getElementById("borderTop"), document.getElementById("borderLeft"), document.getElementById("borderRight"), document.getElementById("borderBottom")],
		SelectBox: document.getElementById("SelectBox"),
		Shearbar: document.getElementById("Shearbar"),
		UpFun: function() {
			d.MoveDiv.DivWHFun()
		}
	}), d.complete = function(a) {
		var c, e, d, f, g, h, b = this.arg.scope.childNodes[0];
		for ("point" === b.className && this.arg.scope.removeChild(b), c = document.createElement("div"), c.className = "complete", c.style.height = this.arg.scopeHeight + "px", this.arg.scope.insertBefore(c, this.arg.scope.childNodes[0]), d = a.length, f = d; d > f; f++) e = document.createElement("img"), c.appendChild(e), e.src = this.arg.relativeUrl + a[f]["ImgUrl"];
		this.HTML5.EffectsReturn(), this.HTML5.BOLBID && this.HTML5.URL.revokeObjectURL(this.HTML5.BOLBID), e = document.createElement("DIV"), e.className = "completeTxt", e.innerHTML = "<strong><i></i>图片上传成功</strong> <button id='completeA'>上传成功</button>", c.appendChild(e), g = document.getElementById("completeA"), h = this, h.preview.close_(), g.onclick || (g.onclick = function() {
			$('#img_iframe'+strs[5], window.parent.document).attr("class", "hidden");
			$('#image_block'+strs[5], window.parent.document).attr({"class":"",'src':a[a.length-1]['ImgUrl']});
			$('#image_title'+strs[5], window.parent.document).attr('value', a[0]['ImgName']);
			$('#reuplod'+strs[5], window.parent.document).attr("class", "btn btn-sm show img_upload_reuplod")
		})
	}, e = document.getElementById("photoalbum"), f = document.getElementById("ShearPhotoForm"), f.UpFile.onclick = function() {
		return !1
	}, g = new ShearPhoto.frameUpImg({
		url: a + "php/upload.php",
		FORM: f,
		UpType: new Array("jpg", "jpeg", "png", "gif"),
		FilesSize: 2,
		HTML5: d.HTML5,
		HTML5FilesSize: d.arg.HTML5FilesSize,
		HTML5ZIP: d.arg.HTML5ZIP,
		erro: function(a) {
			d.pointhandle(3e3, 10, a, 0, "#f82373", "#fff")
		},
		fileClick: function() {
			d.pointhandle(-1)
		},
		preced: function(a) {
			try {
				e.style.display = "none", u.onclick()
			} catch (b) {}
			d.pointhandle(0, 10, "图片加载中......", 2, "#307ff6", "#fff", a)
		}
	}), g.run(function(a, b) {
		return b || (a = ShearPhoto.JsonString.StringToJson(a)), a === !1 ? (d.SendUserMsg("运行环境异常", 5e3, 0, "#f4102b", "#fff", !0, !0), void 0) : a.erro ? (d.SendUserMsg("错误：" + a.erro, 5e3, 0, "#f4102b", "#fff", !0, !0), void 0) : (d.run(a.success, !0), void 0)
	});
	try {
		for (h = {
			".jpg": "image/jpeg",
			".jpeg": "image/jpeg",
			".gif": "image/jpeg",
			".png": "image/png"
		}, i = function(a) {
			return h[/\.[^.]+$/.exec(a)] || "image/jpeg"
		}, document.documentElement, k = document.getElementById("PhotoLoading"), l = e.getElementsByTagName("li"), m = function() {
			var a = this.getElementsByTagName("img")[0].getAttribute("serveUrl");
			d.HTML5.ImagesType = i(a), d.run(a), e.style.display = "none"
		}, n = 0; n < l.length; n++) l[n].onclick = m;
		k.onclick = function() {
			e.style.display = "block"
		}, document.getElementById("close").onclick = function() {
			e.style.display = "none"
		}
	} catch (o) {}
	d.addEvent(document.getElementById("saveShear"), "click", function() {
		d.SendPHP({
			shearphoto: "",
			mingge: ""
		})
	}), d.addEvent(document.getElementById("againIMG"), "click", function() {
		d.preview.close_(), d.again(), d.HTML5.EffectsReturn(), d.HTML5.BOLBID && d.HTML5.URL.revokeObjectURL(d.HTML5.BOLBID), d.pointhandle(3e3, 10, "已取消！重新选择", 2, "#fbeb61", "#3a414c")
	});
	x = document.getElementById("shearphoto_loading"), y = document.getElementById("shearphoto_main"), x && x.parentNode.removeChild(x), y.style.visibility = "visible"
});