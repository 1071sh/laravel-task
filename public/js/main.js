(function() {
    "use strict";

    // 削除ボタン
    $(function() {
        $("#btnDelete").click(function() {
            if (confirm("本当に削除しますか？")) {
            } else {
                return false;
            }
        });
    });

    // アンケート集計画面 削除チェックボックス
    $(function() {
        $("#all").on("click", function() {
            $("input[name='chk[]']").prop("checked", this.checked);
        });
        $("input[name='chk[]']").on("click", function() {
            if ($("#boxes :checked").length == $("#boxes :input").length) {
                $("#all").prop("checked", true);
            } else {
                $("#all").prop("checked", false);
            }
        });
    });
})();
