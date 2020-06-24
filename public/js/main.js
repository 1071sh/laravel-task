(function () {
    "use strict";

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
        $("#all").on("click", function () {
            $("input[name='chk[]']").prop("checked", this.checked);
        });
        $("input[name='chk[]']").on("click", function () {
            if ($("#boxes :checked").length == $("#boxes :input").length) {
                $("#all").prop("checked", true);
            } else {
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
