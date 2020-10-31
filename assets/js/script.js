// Settings For MDUI 
var $ = mdui.$;

// RSS-MENU

var rss = new mdui.Menu('#open-rss-menu', '#rss-menu');

// method
document.getElementById('open-rss-menu').addEventListener('click', function () {
    rss.open();
});


// DRAWER
var drawer = new mdui.Drawer('#drawer');

// 切换 (#toggle)
document.getElementById('toggle').addEventListener('click', function () {
    drawer.toggle();
});



// HeadRoom
// var headroom = new mdui.Headroom('#appbar');
