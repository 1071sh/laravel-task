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

    $(function () {
        // 「全選択」する
        $("#all").on("click", function () {
            $("input[name='chk[]']").prop("checked", this.checked);
        });

        // 「全選択」以外のチェックボックスがクリックされたら、
        $("input[name='chk[]']").on("click", function () {
            if ($("#boxes :checked").length == $("#boxes :input").length) {
                // 全てのチェックボックスにチェックが入っていたら、「全選択」 = checked
                $("#all").prop("checked", true);
            } else {
                // 1つでもチェックが入っていたら、「全選択」 = checked
                $("#all").prop("checked", false);
            }
        });
    });

    $('input[type="checkbox"]').each(function () {
        var checkbox = $(this);
        var checked = $(this).data("checked");
        if (checked == "on") {
            checkbox.prop("checked", true);
        } else {
            checkbox.prop("checked", false);
        }
    });
})();
