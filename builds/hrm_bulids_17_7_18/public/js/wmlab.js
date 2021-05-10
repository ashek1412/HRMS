$(document).ready(function() {
    function t(t) {
        $.ajax({
            url: "/check-notification",
            type: "post",
            data: {
                id: t.id
            },
            error: function() {},
            success: function(t) {
                if (t.new_notification) {
                    console.log(t), $(document).prop("title", t.notification_count + " " + ce);
                    var e = $("#buzzer")[0];
                    e.play(), Y("load-notification-message")
                }
            }
        })
    }

    function e(t) {
        $(t).each(function() {
            var t = $(this).attr("id");
            0 == $("#" + t + " .list-data").children().length && $("#" + t).hide()
        })
    }

    function a(t) {
        if (void 0 === t && (t = 0), t) var e = "#myModal ";
        else var e = "";
        $(e + ".datepicker").each(function() {
            $(this).attr("readonly", "readonly")
        }), $(e + ".hidden_fields").each(function() {
            $(this).attr("readonly", "readonly")
        })
    }

    function n(t) {
        for (var e = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", a = "", n = t; n > 0; --n) a += e[Math.floor(Math.random() * e.length)];
        return a
    }

    function r(t) {
        $(t).each(function() {
            var t = n(40);
            $(this).attr("id", t);
            var e = "&module=" + $(this).attr("data-module") + "&key=" + t;
            $(this).attr("data-key", t);
            var a = t + "-list";
            $(this).find(".file-uploader-list").attr("id", a), $("#" + a).attr("data-source", "/upload-list"), $("#" + a).attr("data-extra", e), $("#" + a).html("");
            var r = $(this).attr("data-module"),
                i = $(this).attr("data-module-id"),
                s = $(this).attr("data-key"),
                o = $(this).find(".file-uploader-button");
            $(o).uploadFile({
                url: "/upload",
                fileName: "file",
                returnType: "json",
                uploadStr: o.attr("data-upload-button"),
                maxFileSize: o.attr("data-max-size"),
                autoSubmit: !0,
                dragDrop: !1,
                multiple: !1,
                formData: {
                    module: r,
                    module_id: i,
                    key: s
                },
                onSuccess: function(t, e) {
                    toastr.success(e.message, "", {
                        positionClass: Z
                    }), Y(e.key + "-list")
                },
                onError: function(t, e, a) {
                    toastr.error(a, "", {
                        positionClass: Z
                    })
                }
            })
        })
    }

    function i() {
        $("#sidebar-menu > ul > li > a").click(function() {
            $("#sidebar-menu li").removeClass("selected"), $(this).closest("li").addClass("selected");
            var t = $(this).next();
            return t.is("ul") && t.is(":visible") && ($(this).closest("li").removeClass("selected"), t.slideUp("fast")), t.is("ul") && !t.is(":visible") && ($("#sidebar-menu ul ul:visible").slideUp("fast"), t.slideDown("fast")), 0 == $(this).closest("li").find("ul").children().length ? !0 : !1
        })
    }

    function s() {
        $.ajax({
            url: "/sidebar",
            data: {
                lock: 1,
                menu: he
            },
            error: function() {},
            dataType: "html",
            success: function(t) {
                $("#sidebar-menu-list").html(t), $("#sidebar-menu-list li").not(".no-sort").sort(o).appendTo("#sidebar-menu-list"), $("#sidebar-menu-list li").not(".no-sort").each(function(t, e) {
                    0 == $(e).data("visible") && $(e).hide()
                }), i(), e("#sidebar-menu-list .list-container")
            },
            type: "POST"
        })
    }

    function o(t, e) {
        return $(e).data("position") < $(t).data("position") ? 1 : -1
    }

    function l() {
        $(".enable-show-hide").each(function() {
            var t = $(this).attr("name");
            d(t)
        })
    }

    function d(t, e) {
        if (void 0 === e && (e = 0), e) var a = "#myModal ";
        else var a = "";
        $(a + "#" + t + "_field").length && (h(t, e), $(a + 'input[name="' + t + '"]').on("switchChange.bootstrapSwitch", function() {
            h(t, e)
        }))
    }

    function h(t, e) {
        if (e) var a = "#myModal ";
        else var a = "";
        var n = t + "_field";
        $(a + 'input[name="' + t + '"]').is(":checked") ? $(a + "#" + n).show() : $(a + "#" + n).hide()
    }

    function c() {
        var t = $("#leave-status-form #status").val();
        "approved" == t ? $(".leave_date_approved").show() : $(".leave_date_approved").hide()
    }

    function u(t) {
        $(t + " #template_id").on("change", function() {
            $.ajax({
                url: $(t).attr("data-url"),
                type: "post",
                data: {
                    template_id: $(this).val(),
                    user_id: $(t).attr("data-user-id")
                },
                error: function() {},
                success: function(e) {
                    "success" == e.status && ($(t + " #mail_subject").val(e.subject), $(t + " #mail_body").summernote("code", e.body))
                }
            })
        })
    }

    function p(t) {
        $(t).iCheck({
            checkboxClass: "icheckbox_flat-blue",
            radioClass: "iradio_flat-blue",
            increaseArea: "20%"
        })
    }

    function g(t) {
        $(t).selectpicker({
            size: 5,
            liveSearch: !0
        })
    }

    function m(t) {
        $(t).length && $(t).clockpicker({
            donetext: "Done",
            twelvehour: !0,
            autoclose: !0,
            "default": "now"
        })
    }

    function f(t) {
        $(t).length && $(t).summernote({
            placeholder: "Type here",
            height: $(t).attr("data-height") ? $(t).attr("data-height") : 100
        })
    }

    function y(t) {
        $(t).length && $(t).redactor({
            minHeight: $(t).attr("data-height") ? $(t).attr("data-height") : 250
        })
    }

    function w(t) {
        $(t).length > 0 && $(t).datepicker({
            format: "yyyy-mm-dd",
            clearBtn: !0
        })
    }

    function v(t) {
        return available_date.length ? (dmy = t.getFullYear() + "-" + ("0" + (t.getMonth() + 1)).slice(-2) + "-" + ("0" + t.getDate()).slice(-2), -1 != $.inArray(dmy, available_date) ? !0 : !1) : !0
    }

    function _(t) {
        $(t).length > 0 && $(t).datepicker({
            format: "yyyy-mm-dd",
            autoclose: !0,
            multidate: !1,
            beforeShowDay: function(t) {
                return v(t)
            },
            clearBtn: !0,
            todayHighlight: !0,
            language: de
        })
    }

    function b(t) {
        $(t).length > 0 && $(t).datetimepicker({
            autoclose: 1,
            format: "yyyy-mm-dd HH:ii p",
            startView: 1,
            minuteStep: 1,
            initialDate: default_datetimepicker_date
        })
    }

    function x() {
        $("textarea").on("propertychange keyup input paste", function() {
            if ($(this).attr("data-show-counter") > 0) {
                var t = $(this).attr("data-limit") ? $(this).data("limit") : ae,
                    e = t - $(this).val().length;
                e > 0 || $(this).val($(this).val().substring(0, t)), $(this).next("span").text((e > 0 ? e : 0) + " " + ee)
            }
        })
    }

    function k() {
        $.each($("textarea[data-autoresize]"), function() {
            var t = this.offsetHeight - this.clientHeight,
                e = function(e) {
                    $(e).css("height", "auto").css("height", e.scrollHeight + t)
                };
            $(this).on("keyup input", function() {
                e(this)
            }).removeAttr("data-autoresize")
        })
    }

    function j(t) {
        if (void 0 === t && (t = 0), t) var e = "#myModal ",
            a = '#user-salary-edit-form select[name="type"]';
        else var e = "",
            a = '#user-salary-form select[name="type"]';
        $(e + ".hourly_salary_field").hide(), $(e + ".monthly_salary_field").hide();
        var n = $(e + a).val();
        "hourly" == n ? $(e + ".hourly_salary_field").show() : "monthly" == n && $(e + ".monthly_salary_field").show()
    }

    function C(t) {
        if (void 0 === t && (t = 0), t) var e = "#myModal ",
            a = '#payroll-edit-form select[name="type"]';
        else var e = "",
            a = '#payroll-form select[name="type"]';
        $(e + ".hourly_salary_field").hide(), $(e + ".monthly_salary_field").hide();
        var n = $(e + a).val();
        "hourly" == n ? $(e + ".hourly_salary_field").show() : "monthly" == n && $(e + ".monthly_salary_field").show()
    }

    function T() {
        $(".leave_no_of_level").hide(), $(".leave_approval_level_designation").hide();
        var t = $('select[name="leave_approval_level"]').val();
        "multiple" == t ? $(".leave_no_of_level").show() : "designation" == t && $(".leave_approval_level_designation").show()
    }

    function M() {
        $(".expense_no_of_level").hide(), $(".expense_approval_level_designation").hide();
        var t = $('select[name="expense_approval_level"]').val();
        "multiple" == t ? $(".expense_no_of_level").show() : "designation" == t && $(".expense_approval_level_designation").show()
    }

    function S(t) {
        if (void 0 === t && (t = 0), t) var e = "#myModal ";
        else var e = "";
        var a = $(e + "#announcement-audience").val();
        O(a, e), $(document).on("change", e + "#announcement-audience", function() {
            var t = $(e + "#announcement-audience").val();
            O(t, e)
        })
    }

    function O(t, e) {
        "user" == t ? ($(e + ".announcement-audience-user").show(), $(e + ".announcement-audience-designation").hide()) : "designation" == t ? ($(e + ".announcement-audience-user").hide(), $(e + ".announcement-audience-designation").show()) : ($(e + ".announcement-audience-user").hide(), $(e + ".announcement-audience-designation").hide())
    }

    function D(t) {
        if (void 0 === t && (t = 0), t) var e = "#myModal ";
        else var e = "";
        var a = $(e + "#award-duration").val();
        A(a, e), $(document).on("change", e + "#award-duration", function() {
            var t = $(e + "#award-duration").val();
            A(t, e)
        })
    }

    function A(t, e) {
        "monthly" == t ? ($(e + ".award-monthly-field").show(), $(e + ".award-yearly-field").hide(), $(e + ".award-period-field").hide()) : "yearly" == t ? ($(e + ".award-yearly-field").show(), $(e + ".award-monthly-field").hide(), $(e + ".award-period-field").hide()) : "period" == t ? ($(e + ".award-period-field").show(), $(e + ".award-yearly-field").hide(), $(e + ".award-monthly-field").hide()) : ($(e + ".award-period-field").hide(), $(e + ".award-yearly-field").hide(), $(e + ".award-monthly-field").hide())
    }

    function z() {
        $.ajax({
            url: "/daily-attendance/lists",
            type: "post",
            data: {
                attendance_statistics: 1
            },
            dataType: "html",
            error: function() {},
            success: function(t) {
                $("#attendance-statistics-table > tbody").html(t), $(".show-table td:last-child").addClass("text-right")
            }
        })
    }

    function B(t) {
        if ($("#" + t).attr("data-extra")) var e = "table=table" + $("#" + t).attr("data-extra");
        else var e = "table=table";
        $.ajax({
            url: $("#" + t).attr("data-source"),
            data: e,
            error: function() {},
            dataType: "html",
            success: function(e) {
                $("#" + t + "> tbody").html(e), $(".show-table td:last-child").addClass("text-right")
            },
            type: "POST"
        })
    }

    function P() {
        $("#myModal .enable-show-hide").each(function() {
            var t = $(this).attr("name");
            d(t, 1)
        }), j(1), $('#myModal #user-salary-edit-form select[name="type"]').on("change", function() {
            j(1)
        }), C(1), $('#myModal #payroll-edit-form select[name="type"]').on("change", function() {
            C(1)
        }), S(1), D(1), a(1), $(".show-shift").hide(), $(".show-custom-shift").hide();
        var t = $("#myModal #shift_type").val();
        "predefined" == t ? $(".show-shift").show() : $(".show-custom-shift").show(), $("#myModal #shift_type").on("change", function() {
            var t = $("#myModal #shift_type").val();
            "predefined" == t ? ($(".show-shift").show(), $(".show-custom-shift").hide()) : ($(".show-custom-shift").show(), $(".show-shift").hide())
        }), w("#myModal .input-daterange"), m("#myModal .timepicker"), $("#myModal .file-uploader").length && r("#myModal .file-uploader"), $("#myModal .switch-input").bootstrapSwitch(), $('input[data-role="tagsinput"]').length && $('input[data-role="tagsinput"]').tagsinput("refresh"), $(".show-table td:last-child").addClass("text-right"), g("#myModal .show-tick"), p("#myModal .icheck"), _("#myModal .datepicker"), f("#myModal .summernote"), y("#myModal .redactor"), b("#myModal .datetimepicker"), x(), k();
        var e = $("#myModal").find("form");
        $("#myModal").find("form").on("submit", function(t) {
            "noAjax" != $(e).attr("data-submit") && (t.preventDefault(), E($(e)))
        }), $("#myModal .password-strength").pwstrength()
    }

    function H() {
        mail_driver = $("#mail_driver").val(), $(".mail_config").hide(), "smtp" == mail_driver ? $("#smtp_configuration").show() : "mandrill" == mail_driver ? $("#mandrill_configuration").show() : "mailgun" == mail_driver ? $("#mailgun_configuration").show() : $(".mail_config").hide()
    }

    function I() {
        $("form").on("submit", function(t) {
            var e = $("#" + $(this).attr("id"));
            "noAjax" != e.attr("data-submit") && (t.preventDefault(), E(e))
        })
    }

    function E(t) {
        $(t).find(".switch-input").each(function() {
            if (!$(this).is(":checked") && 0 == $(this).attr("data-off-value")) var e = '<input type="hidden" name="' + $(this).attr("name") + '" value="0" />';
            $(t).append(e)
        }), t.find(":submit").prop("disabled", !0), $("#loading-img").fadeIn("slow"), toastr.info(ne, "", {
            positionClass: Z
        }), $("#" + t.attr("id")).find(".form-group").removeClass("has-error");
        var e = new FormData($("#" + t.attr("id"))[0]);
        if (t.attr("data-file-upload")) {
            var a = [];
            $("#" + t.attr("id")).find(t.attr("data-file-upload")).each(function() {
                a.push($(this).attr("data-key"))
            }), e.append("upload_key[]", a)
        }
        e.append("ajax_submit", 1), t.attr("data-draggable") && $(".draggable-container .draggable").each(function(t, a) {
            e.append($(a).attr("data-name"), $(a).attr("data-index"))
        }), $.ajax({
            url: t.attr("action"),
            type: "post",
            contentType: !1,
            processData: !1,
            data: e,
            success: function(e) {
                var a = e.redirect ? e.redirect : t.attr("data-redirect") ? t.attr("data-redirect") : "",
                    n = t.attr("data-redirect-msg") ? t.attr("data-redirect-msg") : re,
                    i = t.attr("data-redirect-duration") ? t.attr("data-redirect-duration") : 2e3;
                toastr.clear(), "error" == e.status ? (toastr.error(e.message, "", {
                    positionClass: Z
                }), a && setTimeout(function() {
                    window.location.href = a
                }, i)) : (e.message && toastr.success(e.message, "", {
                    positionClass: Z
                }), a && (toastr.success(n, "", {
                    positionClass: Z
                }), setTimeout(function() {
                    window.location.href = a
                }, i)), $("#myModal").modal("hide"), $(".datatable").length > 0 && N(), t.attr("data-refresh") && Y(t.attr("data-refresh")), t.attr("data-no-form-clear") || F(t), t.attr("data-sidebar") && s(), $("#setup_guide").length > 0 && $("#setup_guide").html(e.setup_guide), t.attr("data-setup-guide-complete") && $("#setup_panel").hide(), t.attr("data-table-refresh") && B(t.attr("data-table-refresh")), e.refresh_table && B(e.refresh_table), e.refresh_content && Y(e.refresh_content), e.new_data && $("#" + e.new_data.field).length > 0 && ($("#" + e.new_data.field).append('<option value="' + e.new_data.id + '">' + e.new_data.value + "</option>"), $("#" + e.new_data.field).selectpicker("refresh")), $("#designation-hierarchy").length && V("designation"), $("#location-hierarchy").length && V("location"), t.attr("data-file-upload") && r(t.attr("data-file-upload")), $("#auth_token").length > 0 && "" != e.auth_token && null != e.auth_token && $("#auth_token").html(e.auth_token))
            },
            error: function(e) {
                if (toastr.clear(), 422 === e.status) {
                    var a = JSON.parse(e.responseText),
                        n = "";
                    $.each(a, function(e, a) {
                        $("#" + t.attr("id") + ' input[name="' + e + '"]').closest(".form-group").addClass("has-error"), "" == n && ($("#" + t.attr("id") + ' input[name="' + e + '"]').focus(), se || (n = a[0] + "<br />")), se && (n += a[0] + "<br />")
                    }), toastr.error(n, "", {
                        positionClass: Z
                    })
                } else toastr.error(te, "", {
                    positionClass: Z
                })
            },
            complete: function() {
                t.find(":submit").prop("disabled", !1), $("#loading-img").fadeOut("slow")
            }
        })
    }

    function F(t) {
        $(t).find(":input").each(function() {
            switch (this.type) {
                case "email":
                case "url":
                case "number":
                case "password":
                case "text":
                case "textarea":
                case "file":
                    $(this).val("");
                    break;
                case "checkbox":
                case "radio":
                    this.checked = !1, $(t).find(".icheck").iCheck({
                        uncheckedClass: "",
                        checkboxClass: "icheckbox_flat-blue",
                        radioClass: "iradio_flat-blue",
                        increaseArea: "20%"
                    })
            }
        }), $(".switch-input").bootstrapSwitch("destroy", !0), $(".switch-input").bootstrapSwitch(), l(), $(".show-tick").selectpicker("val", ""), $(".summernote").length && $(t).find(".summernote").summernote("reset"), $(".redactor").length && $(".redactor").redactor("code.set", ""), $('input[data-role="tagsinput"]').length && $('input[data-role="tagsinput"]').tagsinput("removeAll"), $(".countdown").html("")
    }

    function W(t) {
        var e;
        return e = $("#" + t).attr("data-form") ? $("#" + $("#" + t).attr("data-form")).serialize() : {
            _token: K
        }
    }

    function L(t) {
        return [{
            extend: "print",
            text: '<i class="fa fa-print"></i>',
            title: $("#" + t).attr("data-table-title"),
            exportOptions: {
                columns: ":visible"
            }
        }, {
            extend: "excel",
            text: '<i class="fa fa-file-excel-o"></i>',
            exportOptions: {
                columns: ":visible"
            }
        }, {
            extend: "pdf",
            text: '<i class="fa fa-file-pdf-o"></i>',
            title: $("#" + t).attr("data-table-title"),
            exportOptions: {
                columns: ":visible"
            }
        }, {
            extend: "copy",
            text: '<i class="fa fa-files-o"></i>',
            exportOptions: {
                columns: ":visible"
            }
        }, {
            extend: "colvis",
            text: '<i class="fa fa-columns"></i>'
        }]
    }

    function N() {
        $(".datatable").each(function() {
            var t = $(this).attr("id");
            pe[t].ajax.reload()
        })
    }

    function G(t, e) {
        $("#" + e).height(t.height);
        var a = echarts.init(document.getElementById(e)),
            n = {
                title: {
                    text: t.text
                },
                tooltip: {
                    trigger: "axis"
                },
                legend: {
                    data: t.legend
                },
                noDataLoadingOption: $e,
                toolbox: me,
                xAxis: [{
                    type: "value",
                    boundaryGap: [0, .01]
                }],
                yAxis: [{
                    type: "category",
                    data: t.y_data
                }],
                series: t.x_data
            };
        a.setOption(n)
    }

    function R(t, e) {
        $("#" + e).height(300);
        var a = echarts.init(document.getElementById(e)),
            n = {
                title: {
                    text: t.title_text
                },
                tooltip: {
                    trigger: "item",
                    formatter: "{b} : {c} ({d}%)"
                },
                noDataLoadingOption: $e,
                legend: {
                    orient: "vertical",
                    x: "right",
                    y: "bottom",
                    data: t.legend
                },
                toolbox: me,
                series: [{
                    name: t.name,
                    type: "pie",
                    radius: ["50%", "70%"],
                    itemStyle: ge,
                    data: t.data
                }]
            };
        a.clear(), a.setOption(n)
    }

    function U(t, e) {
        $("#" + e).height(t.height);
        var a = echarts.init(document.getElementById(e));
        option = {
            title: {
                text: t.title_text
            },
            tooltip: {
                trigger: "axis",
                formatter: "{b} : {c} " + t.title
            },
            noDataLoadingOption: $e,
            legend: {
                data: t.legend,
                x: "right",
                y: "bottom"
            },
            toolbox: me,
            xAxis: [{
                type: "value",
                boundaryGap: [0, .01]
            }],
            yAxis: [{
                type: "category",
                data: t.ydata
            }],
            series: [{
                name: t.name,
                type: "bar",
                mapValuePrecision: 0,
                data: t.xdata
            }]
        }, a.clear(), a.setOption(option)
    }

    function V(t) {
        $.ajax({
            url: "/" + t + "/hierarchy",
            error: function() {},
            dataType: "html",
            success: function(e) {
                $("#" + t + "-hierarchy").html(e)
            },
            type: "POST"
        })
    }

    function q(t) {
        var e = "ajax_submit=1";
        $(t).attr("data-extra") && (e += $(t).attr("data-extra")), $(t).attr("data-field") && (e = e + "&" + $(t).attr("data-field") + "=" + $("#" + $(t).attr("data-field")).val()), $.ajax({
            url: $(t).attr("data-source"),
            data: e,
            dataType: "json",
            type: "post",
            error: function() {
                toastr.error(te, "", {
                    positionClass: Z
                })
            },
            success: function(e) {
                "error" == e.status ? toastr.error(e.message, "", {
                    positionClass: Z
                }) : ($(".datatable").length > 0 && N(), $(t).attr("data-refresh") && Y($(t).attr("data-refresh")), $(t).attr("data-table-refresh") && B($(t).attr("data-table-refresh")), $(t).hasClass("mark-hidden") && $(t).parent("p").hide(), e.message && toastr.success(e.message, "", {
                    positionClass: Z
                }), e.redirect && setTimeout(function() {
                    window.location.href = e.redirect
                }, 2e3))
            }
        })
    }

    function J() {
        $.ajax({
            url: "/fetch-chat",
            data: {
                lock: 1
            },
            error: function() {},
            dataType: "html",
            success: function(t) {
                $("#chat-messages").html(t), $("#chat-messages .textAvatar").nameBadge(), $("#chat-box").animate({
                    scrollTop: $("#chat-messages").height()
                }, "fast")
            },
            type: "POST"
        })
    }

    function Q() {
        var t = "uuid=" + $("#load-message").attr("data-uuid");
        $.ajax({
            url: "/load-message",
            error: function() {},
            data: t,
            dataType: "html",
            success: function(t) {
                $("#load-message").html(t), $("#load-message .textAvatar").nameBadge()
            },
            type: "POST"
        })
    }

    function X(t) {
        var e = "ajax=1";
        $("#" + t).attr("data-extra") && (e += $("#" + t).attr("data-extra")), $("#" + t).attr("data-field") && (e = e + "&" + $("#" + t).attr("data-field") + "=" + $("#" + $("#" + t).attr("data-field")).val());
        var a = $("#" + t).attr("data-source");
        $.ajax({
            url: a,
            error: function() {},
            data: e,
            dataType: "html",
            success: function(e) {
                $("#" + t).html(e), $("#" + t + " .textAvatar").nameBadge(), $(".show-table td:last-child").addClass("text-right"), x(), k()
            },
            type: "POST"
        })
    }

    function Y(t) {
        for (var e = t.split(","), a = 0; a < e.length; a++) "chat-messages" == e[a] ? J() : "load-message" == e[a] ? Q() : $("#" + e[a]).length && X(e[a])
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        }
    }), $(window).load(function() {
        $("#loading").fadeOut("slow")
    });
    var K = $('meta[name="csrf-token"]').attr("content"),
        Z = $("#js-var").attr("data-toastr-position"),
        te = $("#js-var").attr("data-something-error-message"),
        ee = $("#js-var").attr("data-character-remaining"),
        ae = $("#js-var").attr("data-textarea-limit"),
        ne = $("#js-var").attr("data-processing-messsage"),
        re = $("#js-var").attr("data-redirecting-messsage"),
        ie = $("#js-var").attr("data-action-confirm-message"),
        se = $("#js-var").attr("data-show-error-message"),
        oe = $("#js-var").attr("data-calendar-language"),
        le = $("#js-var").attr("data-datatable-language"),
        de = $("#js-var").attr("data-datepicker-language"),
        he = $("#js-var").attr("data-menu"),
        ce = $("#js-var").attr("data-new-notification");
    $(".slimscroller").length && $(".slimscroller").slimscroll({
        height: "auto",
        size: "15px",
        railOpacity: .3,
        wheelStep: 5
    }), $.ajax({
        url: "/pusher-credential",
        type: "POST",
        error: function() {},
        dataType: "json",
        success: function(e) {
            if (e.notification) {
                var a = new Pusher(e.key, {
                        cluster: e.cluster,
                        encrypted: e.encrypted
                    }),
                    n = a.subscribe("my-channel");
                n.bind("App\\Events\\PushEvent", t)
            }
        }
    }), $(".play-music").on("click", function() {
        var t = $(this).attr("id"),
            e = $("#music_" + t)[0];
        e.play()
    }), e(".list-container"), a(), $(".file-uploader").length && r(".file-uploader"), $(".tab-list").each(function() {
        $(this).children().first().addClass("active")
    }), $(".tab-content div:first-child").addClass("active"), $(".show-count").each(function() {
        $(this).prop("Counter", 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4e3,
            easing: "swing",
            step: function(t) {
                $(this).text(Math.ceil(t))
            }
        })
    }), $(".slider").length && ($(".slider").slider(), $(".slider").on("slide", function(t) {
        var e = t.value,
            a = e[0] + " to " + e[1];
        $(".slider").next("span").text(a)
    })), $(".tooltips").tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    }), $("button.show-sidebar").click(function() {
        $("div.left").toggleClass("mobile-sidebar"), $("div.right").toggleClass("mobile-content"), $("div.logo-brand").toggleClass("logo-brand-toggle")
    }), i(), $("#sidebar-menu").length && s(), $(".draggable-container").length && $(".draggable-container").sortable({
        update: function() {
            $(".draggable-container .draggable").each(function(t, e) {
                $elm = $(e), $elm.attr("data-index", $elm.index(".draggable-container .draggable"))
            })
        }
    }), $(".switch-input").length && $(".switch-input").bootstrapSwitch(), $(".file-input").length && $(".file-input").bootstrapFileInput(), $(".password-strength").length && $(".password-strength").pwstrength(), $(".textAvatar").length && $(".textAvatar").nameBadge(), $(".show-table td:last-child").addClass("text-right"), _(".datepicker"), p(".icheck"), g(".show-tick"), f(".summernote"), y(".redactor"), m(".timepicker"), b(".datetimepicker"), l(), $("#leave-status-form").length && (c(), $("#leave-status-form #status").on("change", function() {
        c()
    })), $("#user-email-form").length && u("#user-email-form"), $("form").on("keyup keypress", function(t) {
        var e = t.keyCode || t.which;
        return 13 === e && $(this).attr("data-disable-enter-submission") ? (t.preventDefault(), !1) : void 0
    }), $(document).on("click", "[data-submit-alert-message]", function(t) {
        t.preventDefault();
        var e = $(this),
            a = e.attr("data-alert-message") ? e.attr("data-alert-message") : ie;
        bootbox.confirm(a, function(t) {
            if (t) {
                var a = e.closest("form");
                "noAjax" != a.attr("data-submit") ? E(a) : $(a).submit()
            }
        })
    }), $(document).on("click", ".click-alert-message", function(t) {
        t.preventDefault();
        var e = $(this),
            a = e.attr("data-alert-message") ? e.attr("data-alert-message") : ie;
        bootbox.confirm(a, function(t) {
            t && e.attr("data-ajax") && q(e)
        })
    }), w(".input-daterange"), $(".mdatepicker").length > 0 && $(".mdatepicker").datepicker({
        format: "yyyy-mm-dd",
        multidate: !0,
        clearBtn: !0,
        beforeShowDay: function(t) {
            return v(t)
        },
        language: de,
        todayHighlight: !0
    }), $("#myWizard").length > 0 && $("#myWizard").easyWizard({
        buttonsClass: "btn btn-default",
        submitButtonClass: "btn btn-primary",
        showSteps: !0,
        showButtons: !0,
        submitButton: !1
    }), $(".custom-field-option").hide(), $(document).on("change", "#type", function() {
        var t = $("#custom-field-form #type").val();
        "select" == t || "radio" == t || "checkbox" == t ? $(".custom-field-option").show() : $(".custom-field-option").hide()
    }), j(), $('#user-salary-form select[name="type"]').on("change", function() {
        j()
    }), C(), $('#payroll-form select[name="type"]').on("change", function() {
        C()
    }), T(), $('select[name="leave_approval_level"]').on("change", function() {
        T()
    }), M(), $('select[name="expense_approval_level"]').on("change", function() {
        M()
    }), S(), D(), I(), k(), x(), $('input[data-role="tagsinput"]').length && $('input[data-role="tagsinput"]').tagsinput("refresh"), $("#attendance-statistics-table").length && z(), $(".ajax-table").each(function(t, e) {
        var a = $(e).attr("id");
        B(a)
    }), $("#myModal").on("show.bs.modal", function(t) {
        var e = $(t.relatedTarget);
        e.attr("data-href") && $.get(e.attr("data-href"), function(t) {
            $("#myModal").find(".modal-content").html(t), $("#myModal").modal("show"), P()
        }, "html")
    }), $("#myModal").on("hide.bs.modal", function() {
        Y("load-notification-message");
        if($("#render1_calendar").length > 0)
        $('#render1_calendar').fullCalendar('refetchEvents');

    }), H(), $("#mail_driver").on("change", function() {
        H()
    }), $(".post-button").on("click", function() {
        $("#form-action").attr("value", $(this).attr("data-button-value"))
    }),

    $("#render1_calendar").length > 0 && $("#render1_calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month"
        },
        locale: oe,
        events: {
            url: "/shift-calendar-events",
            textColor: 'white',
            data: function() {
                return {
                    usrid: $("#usr_id").text()
                };
            },
            type: "POST"
        },
        timeFormat: 'H(:mm)',
        displayEventTime: false,
        height: 650

/*        eventRender: function(t, e) {
            $(e).tooltip({
                title: t.title
            }), t.icon && e.find(".fc-title").prepend(" <i class='fa fa-" + t.icon + " fa-lg'></i> ")
        }*/


        })

        , $("#render_calendar").length > 0 && $("#render_calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        locale: oe,
        events: {
            url: "/calendar-events",

            type: "POST"
        },
/*     eventRender: function(t, e) {
            $(e).tooltip({
                title: t.title
            }), t.icon && e.find(".fc-title").prepend(" <i class='fa fa-" + t.icon + " fa-lg'></i> ")
        }*/
        eventRender: function(eventObj, $el) {
            $el.popover({
               // title: eventObj.title,
                content: eventObj.description,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            }),
              eventObj.icon && $el.find(".fc-title").prepend(" <i class='fa fa-" + eventObj.icon + " fa-lg'></i> ")
             }
    })/*
        $('#shift-tab').tabs({
            show: function(event, ui) {
                $("#render1_calendar").fullCalendar("render");
            }
        })*/
       ;
    var ue = "<'row'<'col-sm-5 margin-left-10'li><'col-sm-5 pull-right margin-right-10'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4 margin-left-10'B><'col-sm-6 pull-right margin-right-10'p>>",
        pe = [];
    $(".datatable").length > 0 && $(".datatable").each(function() {
        var t = $(this).attr("id");
        pe[t] = $("#" + t).DataTable({
            processing: true,

            dom: ue,
            buttons: L(t),
            ajax: {
                url: "/" + $("#" + t).attr("data-table-source") + "/lists",
                type: "post",
                data: function() {
                    return W(t)
                }
            },
            ordering: !0,
            autoWidth: !0,
            language: {
                url: le
            },
            order: $("#" + t).attr("data-disable-sorting") ? [] : [
                [1, "asc"]
            ],
            columnDefs: $("#" + t).attr("data-disable-sorting") ? [] : [{
                orderable: !1,
                targets: 0
            }]
        }), $("#" + t).on("xhr.dt", function(e, a, n) {
            if (n.foot) {
                var r = $("#" + t).find("tfoot");
                r.length || (r = $("<tfoot>").appendTo("#" + t)), r.html(n.foot)
            }
            n.graph && ($("#user-role-wise-graph").length && R(n.graph.role, "user-role-wise-graph"), $("#user-department-wise-graph").length && R(n.graph.department, "user-department-wise-graph"), $("#user-designation-wise-graph").length && R(n.graph.designation, "user-designation-wise-graph"), $("#user-location-wise-graph").length && R(n.graph.location, "user-location-wise-graph"), $("#user-status-wise-graph").length && R(n.graph.status, "user-status-wise-graph"), $("#user-gender-wise-graph").length && R(n.graph.gender, "user-gender-wise-graph"), $("#leave-status-wise-graph").length && R(n.graph.leave_status, "leave-status-wise-graph"), $("#leave-type-wise-graph").length && R(n.graph.leave_type, "leave-type-wise-graph"), $("#department-wise-leave-graph").length && R(n.graph.leave_department, "department-wise-leave-graph"), $("#location-wise-leave-graph").length && R(n.graph.leave_location, "location-wise-leave-graph"), $("#expense-status-wise-graph").length && R(n.graph.expense_status, "expense-status-wise-graph"), $("#expense-head-wise-graph").length && R(n.graph.expense_head, "expense-head-wise-graph"), $("#department-wise-expense-graph").length && R(n.graph.expense_department, "department-wise-expense-graph"), $("#location-wise-expense-graph").length && R(n.graph.expense_location, "location-wise-expense-graph"), $("#department-wise-award-graph").length && R(n.graph.award_department, "department-wise-award-graph"), $("#location-wise-award-graph").length && R(n.graph.award_location, "location-wise-award-graph"), $("#category-wise-award-graph").length && R(n.graph.award_category, "category-wise-award-graph"), $("#audience-wise-announcement-graph").length && R(n.graph.announcement_audience, "audience-wise-announcement-graph"), $("#designation-wise-announcement-graph").length && R(n.graph.announcement_designation, "designation-wise-announcement-graph"), $("#category-wise-ticket-graph").length && R(n.graph.ticket_category, "category-wise-ticket-graph"), $("#priority-wise-ticket-graph").length && R(n.graph.ticket_priority, "priority-wise-ticket-graph"), $("#status-wise-ticket-graph").length && R(n.graph.ticket_status, "status-wise-ticket-graph"), $("#department-wise-ticket-graph").length && R(n.graph.ticket_department, "department-wise-ticket-graph"), $("#category-wise-task-graph").length && R(n.graph.task_category, "category-wise-task-graph"), $("#priority-wise-task-graph").length && R(n.graph.task_priority, "priority-wise-task-graph"), $("#status-wise-task-graph").length && R(n.graph.task_status, "status-wise-task-graph"), $("#department-wise-task-graph").length && R(n.graph.task_department, "department-wise-task-graph"), $("#holiday-graph").length && U(n.graph.holiday, "holiday-graph"), $("#daily-attendance-late-graph").length && U(n.graph.daily_attendance.late, "daily-attendance-late-graph"), $("#daily-attendance-early-leaving-graph").length && U(n.graph.daily_attendance.early_leaving, "daily-attendance-early-leaving-graph"), $("#daily-attendance-overtime-graph").length && U(n.graph.daily_attendance.overtime, "daily-attendance-overtime-graph"), $("#daily-attendance-working-graph").length && U(n.graph.daily_attendance.working, "daily-attendance-working-graph"), $("#daily-attendance-rest-graph").length && U(n.graph.daily_attendance.rest, "daily-attendance-rest-graph"), $("#date-wise-attendance-late-graph").length && U(n.graph.date_wise_attendance.late, "date-wise-attendance-late-graph"), $("#date-wise-attendance-early-leaving-graph").length && U(n.graph.date_wise_attendance.early_leaving, "date-wise-attendance-early-leaving-graph"), $("#date-wise-attendance-overtime-graph").length && U(n.graph.date_wise_attendance.overtime, "date-wise-attendance-overtime-graph"), $("#date-wise-attendance-working-graph").length && U(n.graph.date_wise_attendance.working, "date-wise-attendance-working-graph"), $("#date-wise-attendance-rest-graph").length && U(n.graph.date_wise_attendance.rest, "date-wise-attendance-rest-graph"), $("#user-wise-summary-attendance-late-graph").length && U(n.graph.user_wise_summary_attendance.late, "user-wise-summary-attendance-late-graph"), $("#user-wise-summary-attendance-early-leaving-graph").length && U(n.graph.user_wise_summary_attendance.early_leaving, "user-wise-summary-attendance-early-leaving-graph"), $("#user-wise-summary-attendance-overtime-graph").length && U(n.graph.user_wise_summary_attendance.overtime, "user-wise-summary-attendance-overtime-graph"), $("#user-wise-summary-attendance-working-graph").length && U(n.graph.user_wise_summary_attendance.working, "user-wise-summary-attendance-working-graph"), $("#user-wise-summary-attendance-rest-graph").length && U(n.graph.user_wise_summary_attendance.rest, "user-wise-summary-attendance-rest-graph"), $("#user-wise-summary-attendance-present-graph").length && U(n.graph.user_wise_summary_attendance.present, "user-wise-summary-attendance-present-graph"), $("#user-wise-summary-attendance-absent-graph").length && U(n.graph.user_wise_summary_attendance.absent, "user-wise-summary-attendance-absent-graph"), $("#user-wise-summary-attendance-leave-graph").length && U(n.graph.user_wise_summary_attendance.leave, "user-wise-summary-attendance-leave-graph"), $("#user-wise-summary-attendance-half-day-graph").length && U(n.graph.user_wise_summary_attendance.half_day, "user-wise-summary-attendance-half-day-graph"), $("#date-wise-summary-attendance-late-graph").length && U(n.graph.date_wise_summary_attendance.late, "date-wise-summary-attendance-late-graph"), $("#date-wise-summary-attendance-early-leaving-graph").length && U(n.graph.date_wise_summary_attendance.early_leaving, "date-wise-summary-attendance-early-leaving-graph"), $("#date-wise-summary-attendance-overtime-graph").length && U(n.graph.date_wise_summary_attendance.overtime, "date-wise-summary-attendance-overtime-graph"), $("#date-wise-summary-attendance-present-graph").length && U(n.graph.date_wise_summary_attendance.present, "date-wise-summary-attendance-present-graph"), $("#date-wise-summary-attendance-absent-graph").length && U(n.graph.date_wise_summary_attendance.absent, "date-wise-summary-attendance-absent-graph"), $("#date-wise-summary-attendance-leave-graph").length && U(n.graph.date_wise_summary_attendance.leave, "date-wise-summary-attendance-leave-graph"), $("#date-wise-summary-attendance-half-day-graph").length && U(n.graph.date_wise_summary_attendance.half_day, "date-wise-summary-attendance-half-day-graph"), $("#daily-shift-graph").length && U(n.graph.daily_shift, "daily-shift-graph"), $("#date-wise-shift-graph").length && U(n.graph.date_wise_shift, "date-wise-shift-graph"))
        })
    });
    var ge = {
            normal: {
                label: {
                    show: !1
                },
                labelLine: {
                    show: !1
                }
            },
            emphasis: {
                label: {
                    show: !0,
                    position: "center",
                    textStyle: {
                        fontSize: "30",
                        fontWeight: "bold"
                    }
                }
            }
        },
        me = {
            show: !0,
            feature: {
                restore: {
                    show: !0,
                    title: "Refresh"
                },
                saveAsImage: {
                    show: !0,
                    title: "Save as Image",
                    lang: "Save Image"
                }
            }
        },
        $e = {
            text: "No Data",
            effect: "bubble"
        };
    $("#expense-monthly-report-graph").length && $.ajax({
        url: "/expense-monthly-report-graph",
        type: "POST",
        error: function() {},
        dataType: "json",
        success: function(t) {
            G(t.expense, "expense-monthly-report-graph")
        }
    }), $("#payroll-monthly-report-graph").length && $.ajax({
        url: "/payroll-monthly-report-graph",
        type: "POST",
        error: function() {},
        dataType: "json",
        success: function(t) {
            G(t.payroll, "payroll-monthly-report-graph")
        }
    }), $("#employment-report-graph").length && $.ajax({
        url: "/employment-report-graph",
        type: "POST",
        error: function() {},
        dataType: "json",
        success: function(t) {
            G(t.employment, "employment-report-graph"), G(t.salary, "salary-wise-employment-report-graph"), G(t.monthly_salary, "monthly-salary-wise-employment-report-graph")
        }
    }), $("#weekly-attendance-statistics-graph").length && $.ajax({
        url: "/date-wise-summary-attendance/lists",
        type: "POST",
        error: function() {},
        dataType: "json",
        data: {
            type: "weekly-attendance-statistics-graph"
        },
        success: function(t) {
            $("#weekly-attendance-statistics-graph").height(300);
            var e = echarts.init(document.getElementById("weekly-attendance-statistics-graph")),
                a = {
                    title: {
                        text: t.dashboard_graph.title_text
                    },
                    tooltip: {
                        trigger: "axis"
                    },
                    noDataLoadingOption: $e,
                    legend: {
                        data: t.dashboard_graph.legend,
                        x: "right",
                        y: "bottom"
                    },
                    toolbox: me,
                    xAxis: [{
                        type: "category",
                        boundaryGap: !1,
                        data: t.dashboard_graph.title
                    }],
                    yAxis: [{
                        type: "value"
                    }],
                    series: t.dashboard_graph.data
                };
            e.setOption(a)
        }
    }), $("#designation-hierarchy").length && V("designation"), $("#location-hierarchy").length && V("location"), $(document.body).on("click", "a", function(t) {
        $('[data-toggle="tooltip"]').tooltip("destroy"), $(this).attr("data-ajax") && !$(this).hasClass("click-alert-message") && (t.preventDefault(), q(this))
    }), $("#chat-messages").length && (J(), $("#chat-messages").attr("data-chat-refresh") > 0 && setInterval(function() {
        J()
    }, 1e3 * $("#chat-messages").attr("data-chat-refresh-duration"))), $("#load-message").length && Q(), $("#load-clock-button").length && X("load-clock-button"), $("#load-user-detail").length && X("load-user-detail"), $("#load-task-detail").length && X("load-task-detail"), $("#load-task-description").length && X("load-task-description"), $("#load-task-activity").length && X("load-task-activity"), $("#load-task-comment").length && X("load-task-comment"), $("#load-task-top-chart").length && X("load-task-top-chart"), $("#load-job-application-detail").length && X("load-job-application-detail"), $("#load-expense-detail").length && X("load-expense-detail"), $("#load-leave-detail").length && X("load-leave-detail"), $("#load-leave-current-status").length && X("load-leave-current-status"), $("#load-ticket-detail").length && X("load-ticket-detail"), $("#load-ticket-reply").length && X("load-ticket-reply"), $("#load-notification-message").length && X("load-notification-message"), $(".login-as").on("click", function() {
        $("input[name='username']").val($(this).attr("data-username")), $("input[name='email']").val($(this).attr("data-email")), $("input[name='password']").val($(this).attr("data-password"))
    }), $(document).on("click", ".task-sign-off-request", function() {
        var t = $(this).attr("data-task-id"),
            e = $(this).attr("data-action"),
            a = $(this).attr("data-url"),
            n = $("#task-sign-off-remarks").val();
        $(this).addClass("disabled"), $.ajax({
            url: a,
            type: "post",
            data: {
                task_id: t,
                remarks: n,
                action: e
            },
            error: function() {},
            success: function(t) {
                "error" == t.status ? t.redirect && setTimeout(function() {
                    window.location.href = t.redirect
                }, 2e3) : (Y("load-task-description"), $(this).removeClass("disabled"))
            }
        })
    })


}),
    function(t) {
        t.fn.nameBadge = function(e) {
            var a = t.extend({
                border: {
                    color: "#ddd",
                    width: 0
                },
                colors: ["#458b00", "#f85931", "#ce1836", "#009989", "#00688b", "#8b1a1a"],
                text: "#fff",
                margin: 2,
                middlename: !0,
                uppercase: !0,
                max: 3
            }, e);
            return this.each(function() {
                var e = t(this).text(),
                    n = t(this).attr("data-image-size") ? t(this).attr("data-image-size") : 60;
                e.trim() || (e = "User");
                var r = e.match(a.middlename ? /\b(\w)/g : /^\w|\b\w(?=\S+$)/g),
                    i = r.join("");
                i = i.substr(0, a.max), t(this).text(i), t(this).css({
                    color: a.text,
                    "background-color": a.colors[Math.floor(Math.random() * a.colors.length)],
                    border: a.border.width + "px solid " + a.border.color,
                    display: "inline-block",
                    "font-family": "Arial, 'Helvetica Neue', Helvetica, sans-serif",
                    "font-size": .4 * n,
                    "border-radius": n + "px",
                    width: n + "px",
                    height: n + "px",
                    "line-height": n + "px",
                    margin: a.margin + "px",
                    "text-align": "center",
                    "float": "left",
                    "text-transform": a.uppercase ? "uppercase" : ""
                })
            })
        }


    }(jQuery);