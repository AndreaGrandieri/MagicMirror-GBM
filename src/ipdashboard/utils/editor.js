import * as utils from "./utils.js";

// JSON Verruckt

var editor_json;
var editor_json_header;
var editor_json_stable;

function initModuloSettings() {
    editor_json = CodeMirror.fromTextArea(document.getElementById("code-json"), {
        lineNumbers: true,
        mode: "application/json",
        gutters: ["CodeMirror-lint-markers"],
        lint: {
            "getAnnotations": jsonValidator,
            "async": true
        }
    });
    editor_json.setSize(700, 300);

    // Semplice aggiunta event handler "change" (riferimento GOOD)
    editor_json.on("change", safeLock);

    editor_json_stable = CodeMirror.fromTextArea(document.getElementById("code-json-stable"), {
        lineNumbers: true,
        mode: "application/json",
        gutters: ["CodeMirror-lint-markers"],
        lint: true,
        readOnly: true
    });
    editor_json_stable.setSize(700, 300);

    editor_json_header = CodeMirror.fromTextArea(document.getElementById("code-json-header"), {
        lineNumbers: true,
        mode: "application/json",
        gutters: ["CodeMirror-lint-markers"],
        lint: true,
        readOnly: true
    });
    editor_json_header.setSize(700, 100);
}
globalThis.initModuloSettings = initModuloSettings;

function jsonValidator(cm, updateLinting, options) {
    var errors = CodeMirror.lint.json(cm, options);

    updateLinting(errors);

    if (errors.length > 0) {
        utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA' disabled>");
    } else {
        utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA'>");
    }
}
globalThis.jsonValidator = jsonValidator;

function safeLock(cm, changeObj) {
    utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA' disabled>");
}
globalThis.safeLock = safeLock;

function copyStable() {
    editor_json.setValue(editor_json_stable.getValue());
}
globalThis.copyStable = copyStable;

////////////////////////////////////////////////////////////////////

// MD Verruckt

var editor_md;

function initModuloSettingsMD() {
    editor_md = CodeMirror.fromTextArea(document.getElementById("code-md"), {
        lineNumbers: true,
        mode: "text/x-markdown"
        /*
        gutters: ["CodeMirror-lint-markers"],
        lint: {
            "getAnnotations": jsonValidator,
            "async": true
        }
        */
    });
    editor_md.setSize(700, 300);

    // Semplice aggiunta event handler "change" (riferimento GOOD)
    editor_md.on("change", safeLock);
}
globalThis.initModuloSettingsMD = initModuloSettingsMD;
