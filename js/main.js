function getLatestRelease(apiURL, classifier) {
    $.getJSON(apiURL)
        .done(function (obj) {
            switch (classifier) {
                case "zip":
                    window.open(obj.zipball_url);
                    break;

                case "tar":
                    window.open(obj.tarball_url);
                    break;
            }
        })
        .fail(function () {
            window.alert("Nessuna release disponibile.");
        });
}
