function getLatestRelease(apiURL) {
    $.getJSON(apiURL)
        .done(function (obj) {
            window.open(obj.zipball_url);
        })
        .fail(function () {
            // Temporaneo
            window.alert("Nessuna release!");
        });
}
