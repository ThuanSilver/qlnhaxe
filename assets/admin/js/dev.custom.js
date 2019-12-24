var app = {
    /**
     * Show notification
     * @param {*} message
     * @param {*} type
     */
    showNotify: function (message, type = "info") {
        var icon_before = "";
        if (type == "success") {
            icon_before = '<em class="fa fa-check"></em>';
        }
        if (type == "error") {
            icon_before = '<em class="fa fa-times-circle"></em>';
        }
        if (type == "warning") {
            icon_before = '<em class="icon-warning22"></em>';
        }
        if (type == "info") {
            icon_before = '<em class="fa fa-info"></em>';
        }
        new Noty({
            theme: "metroui",
            timeout: 5000,
            layout: "bottomRight",
            text: icon_before + "&nbsp;&nbsp;&nbsp;&nbsp;" + message,
            type: type
        }).show();
    }
};


/**
 * Ask to make sure before redirect to uninstall module
 * @param {*} element
 */
function askToUninstallMod(element) {
    if (confirm('Tất cả dữ liệu liên quan sẽ bị xóa và không thể khôi phục. Bạn có chắc chắn muốn gỡ cài đặt module này?')) {
        window.location.href = $(element).data('href');
    }
    return false;
}

/**
 * Ask to make sure before redirect to a delete route
 * @param {*} element
 */
function askToDelete(element) {
    if (confirm('Dữ liệu sẽ không thể khôi phục. Bạn có chắc chắn muốn xóa?')) {
        window.location.href = $(element).data('href');
    }
    return false;
}
