//命名為 top_scroll_percent_bar
function top_scroll_percent_bar() {
    $("body").append("<div class=top_scroll_percent_bar_bg></div>"); //產生進度條背景物件
    $("body").append("<div class=top_scroll_percent_bar></div>"); //進度條 Bar
    $("body").append("<div class=percent_text></div>"); //進度條 % 文字

    //進度條背景 CSS 樣式
    $(".top_scroll_percent_bar_bg").css({
        "position": "fixed",
        "width": "100%",
        "background": "rgba(0,0,0,0.33)",
        "width": "100%",
        "height": "5px",
        "top": 0,
        "z-index": 100001,
    });

    //進度條 Bar CSS 樣式
    $(".top_scroll_percent_bar").css({
        "position": "fixed",
        "background": "#cbd800",
        "width": 0,
        "height": "5px",
        "top": 0,
        "z-index": 100002,
    });

    //進度條 % 文字 CSS 樣式
    /* $(".percent_text").css({
        "position": "fixed",
        "width": "100%",
        "font-size": "9pt",
        "color": "#ffffff",
        "line-height": "14px",
        "text-align": "center",
        "top": 0,
        "z-index": 100003,
    }); */

    function window_scroll() {
        var window_height = $(window).height(); //視窗可視高度
        var total_y = $("body")[0].scrollHeight - window_height; // Y 軸可捲動長度 = Y 軸總長 - 視窗可視高度
        var scroll_y = $(this).scrollTop(); // Y 軸位置 $(window).scrollTop()
        $(".top_scroll_percent_bar").css("width", (scroll_y / total_y * 100) + "%"); // Y 軸位置百分比 : 圖像化
        // $(".percent_text").html(parseInt(scroll_y / total_y * 100) + " % "); // Y 軸位置百分比 : 整數 %
    }

    //初始狀態載入
    window_scroll();

    //捲動時觸發
    $(window).scroll(window_scroll);

    //視窗變動時觸發
    $(window).resize(window_scroll);
};

//載入此 js 文件，所有內容載入完成後即呼叫 top_scroll_percent_bar()
window.onload = function() {
    top_scroll_percent_bar();
};