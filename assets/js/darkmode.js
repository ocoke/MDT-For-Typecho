
/* materiality-typecho-theme Dark Mode
 * https://github.com/EAimTY/materiality-typecho-theme
 * Licensed under The GNU General Public License v3.0
 */
// 写入 Cookie
function setCookie(a, b) {
    (t = new Date).setTime(t.getTime() + 6048e5),
        document.cookie = a + "=" + b + "; expires=" + t.toGMTString() + "; path=/;"
}
function getCookie(b) {
    for (var c, d = b + "=", f = document.cookie.split(";"), g = 0; g < f.length; g++)
        if (c = f[g].trim(),
            0 == c.indexOf(d))
            return c.substring(d.length, c.length);
    return !1
}
// 浅色模式
function light() {
    setCookie("DARK_STATUS", "0"),
        mdui.$("#dark_toggle_icon").html("&#xe3a9;"),
        mdui.$("#color_chrome").attr("content", "#" + getCookie("THEME_COLOR")),
        mdui.$("#color_safari").attr("content", "#" + getCookie("THEME_COLOR")),
        mdui.$("body").removeClass("mdui-theme-layout-dark"),
        mdui.$("footer").addClass("mdui-color-theme"),
        mdui.$(".load-indicator").removeClass("load-indicator-dark")
}
// 深色模式
function dark() {
    setCookie("DARK_STATUS", "1"),
        mdui.$("#dark_toggle_icon").html("&#xe3ac;"),
        mdui.$("#color_chrome").attr("content", "#212121"),
        mdui.$("#color_safari").attr("content", "#212121"),
        mdui.$("body").addClass("mdui-theme-layout-dark"),
        mdui.$("footer").removeClass("mdui-color-theme"),
        mdui.$(".load-indicator").addClass("load-indicator-dark")
}
function setExpire(a) {
    a ? 7 > (e = new Date).getHours() ? setCookie("DARK_EXPIRE", new Date(e.getFullYear(), e.getMonth(), e.getDate(), 7).getTime()) : setCookie("DARK_EXPIRE", new Date(e.getFullYear(), e.getMonth(), e.getDate() + 1, 7).getTime()) : 6 < (e = new Date).getHours() && 20 > e.getHours() ? setCookie("DARK_EXPIRE", new Date(e.getFullYear(), e.getMonth(), e.getDate(), 20).getTime()) : setCookie("DARK_EXPIRE", (20 <= e.getHours() ? new Date(e.getFullYear(), e.getMonth(), e.getDate() + 1, 7) : new Date(e.getFullYear(), e.getMonth(), e.getDate(), 7)).getTime())
}
function toggleDark() {
    "1" == getCookie("DARK_STATUS") ? (light(),
        setExpire(0)) : (dark(),
            setExpire(1))
}
function darkInit() {
    (e = new Date).getTime() > getCookie("DARK_EXPIRE") ? (setCookie("DARK_EXPIRE", "0"),
        1 == getCookie("AUTO_DARK") ? 6 < (e = new Date).getHours() && 20 > e.getHours() ? (light(),
            setExpire(0)) : (dark(),
                setExpire(1)) : (light(),
                    setExpire(0))) : 1 == getCookie("DARK_STATUS") ? dark() : light()
}
window.matchMedia("(prefers-color-scheme: dark)").addListener(a => {
    1 == getCookie("AUTO_DARK") && (a.matches ? (dark(),
        setExpire(1)) : (light(),
            setExpire(0)))
}
),
    mdui.$(function () {
        darkInit(),
            1 == getCookie("AUTO_DARK") && window.matchMedia("prefers-color-scheme: dark").matches && (dark(),
                setCookie("DARK_EXPIRE", "0"))
    });



// 自动切换
window.onload = function() {

	function darkCheck() {
		// 深色模式
		mdui.$("#dark_toggle_icon").html("&#xe3ac;"),
		mdui.$("#color_chrome").attr("content", "#212121"),
		mdui.$("#color_safari").attr("content", "#212121"),
		mdui.$("body").addClass("mdui-theme-layout-dark"),
		mdui.$("footer").removeClass("mdui-color-theme"),
		mdui.$(".load-indicator").addClass("load-indicator-dark")

	}

	function lightCheck() {
		// 浅色模式
		mdui.$("#dark_toggle_icon").html("&#xe3a9;"),
		mdui.$("#color_chrome").attr("content", "#" + getCookie("THEME_COLOR")),
		mdui.$("#color_safari").attr("content", "#" + getCookie("THEME_COLOR")),
		mdui.$("body").removeClass("mdui-theme-layout-dark"),
		mdui.$("footer").addClass("mdui-color-theme"),
		mdui.$(".load-indicator").removeClass("load-indicator-dark")
	}

	// 获取现在的模式
	if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
		darkCheck();
	} else {
		lightCheck();
	}

	// 监听模式变更
    window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
      const newColorScheme = e.matches ? "dark" : "light";
      if (newColorScheme == "dark") {
        darkCheck();
      } else if (newColorScheme == "light") {
        lightCheck();
      }
    });
};
