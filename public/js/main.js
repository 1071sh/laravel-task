(function () {
    "use strict";

    // リセットボタン
    $("#resetBtn").on("click", function () {
        location.href = "http://localhost.task.com/system/answer/index";
    });

    // 削除ボタン
    $(function () {
        $("#btnDelete").click(function () {
            if (confirm("本当に削除しますか？")) {
            } else {
                return false;
            }
        });
    });
})();
