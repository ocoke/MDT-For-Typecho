// Settings For MDUI 
var $ = mdui.$;





// DRAWER
var drawer = new mdui.Drawer('#drawer', { overlay: true });

// 切换 (#toggle)
document.getElementById('toggle').addEventListener('click', function () {
    drawer.toggle();
});



// HeadRoom
// var headroom = new mdui.Headroom('#appbar');
