function getLatestRelease(apiURL) {
    $.getJSON(apiURL, function (obj) {
        var zipball_url = obj.zipball_url;
        if (zipball_url != null && zipball_url != undefined) {
            window.open(obj.zipball_url);
        } else {
            // Temporaneo
            window.alert("Nessuna release!");
        }
    });
}
