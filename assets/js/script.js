// Settings For MDUI 
var $ = mdui.$;

// RSS-MENU

var inst = new mdui.Menu('#open-rss-menu', '#rss-menu');

// method
document.getElementById('open-rss-menu').addEventListener('click', function () {
    inst.open();
});


// DRAWER
var inst = new mdui.Drawer('#drawer');

// 切换 (#toggle)
document.getElementById('toggle').addEventListener('click', function () {
    inst.toggle();
});



// HeadRoom
// var headroom = new mdui.Headroom('#appbar');