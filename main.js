function getLatestRelease(apiURL) {
    $.getJSON(apiURL, function (json) {
        var obj = JSON.parse(json);
        var zipball_url = obj.zipball_url;

        if (zipball_url != null && zipball_url != undefined) {
            window.open(obj.zipball_url);
        }
    });
}
