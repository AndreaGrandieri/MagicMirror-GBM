function getLatestRelease(apiURL) {
    $.getJSON(apiURL, function (json) {
        console.log(apiURL);
        console.log(json);

        var obj = JSON.parse(json);
        var zipball_url = obj.zipball_url;

        console.log(obj);

        if (zipball_url != null && zipball_url != undefined) {
            window.open(obj.zipball_url);
        }
    });
}
