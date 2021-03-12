/*
@author: Andrea Grandieri g.andreus02@gmail.com
*/

export function signature() {
    console.log("Grandieri Andrea JS Script.");
}

export function inject(id, toInject) {
    // inject type: "string"
    // specializedInjectN(id, toInject);
    document.getElementById(id).innerHTML += toInject;
}

export function getValue(id) {
    // return type: "string"
    return document.getElementById(id).value;
}

export function setValue(id, value) {
    document.getElementById(id).value = value;
}

export function getValueRaw(id) {
    // return type: "string"
    return document.getElementById(id).innerHTML;
}

export function clear(id) {
    document.getElementById(id).innerHTML = null;
}

export function clearAndInject(id, toInject) {
    clear(id);
    inject(id, toInject);
}

export function resetForm(formId) {
    document.getElementById(formId).reset();
}

export function end() {
    console.log("Task completed.");
}

export function specializedInjectN(id, toInject) {
    // console.log("ex caught by sIjN");
}

export function getRadiobuttonCheckState(id) {
    // return type: "boolean"
    return document.getElementById(id).checked;
}

export function setRadiobuttonCheckState(id, state) {
    document.getElementById(id).checked = state;
}

export function testStringEmpty(string) {
    // return type: "boolean"
    string = string.trim();
    return string == null || string == "";
}

export function testDateValidity(dateString) {
    // return type: "boolean"
    dateString = dateString.trim();
    let date = Date.parse(dateString);
    return date != null && date != "Invalid Date" && !Number.isNaN(date);
}

export function testDateValidityNow(dateString) {
    // return type: "boolean"
    dateString = dateString.trim();
    if (testDateValidity(dateString)) {
        let now = new Date();
        let date = Date.parse(dateString);
        return !(date > now);
    }
    else {
        return false;
    }
}

/*
@deprecated
export function testStringNumber(string) {
    // return type: "boolean"
    let number = Number.parseInt(string);
    return number != null && number != "NaN";
}
*/

export function testStringContainsOnlyLetters(string) {
    // Regular Expression
    // A regular expression is an object that describes a pattern of characters.
    string = string.trim();
    return /^[a-zA-Z]+$/.test(string);
}

export function testStringContainsOnlyLettersSpaces(string) {
    // Regular Expression
    // A regular expression is an object that describes a pattern of characters.
    string = string.trim();
    return /^[a-zA-Z\s]+$/.test(string);
}

export function testStringContainsOnlyNumbers(string) {
    // Regular Expression
    // A regular expression is an object that describes a pattern of characters.
    string = string.trim();
    return /^\d+$/.test(string);
}

export function testStringNotEmptyContainsOnlyLetters(string) {
    string = string.trim();
    return testStringEmpty(string) ? false : testStringContainsOnlyLetters(string);
}

export function testStringNotEmptyContainsOnlyLettersSpaces(string) {
    string = string.trim();
    return testStringEmpty(string) ? false : testStringContainsOnlyLettersSpaces(string);
}

export function testStringNotEmptyContainsOnlyNumbers(string) {
    string = string.trim();
    return testStringEmpty(string) ? false : testStringContainsOnlyNumbers(string);
}

export function getAge(dateString) {
    dateString = dateString.trim();
    if (testDateValidityNow(dateString)) {
        let now = new Date();
        let date = Date.parse(dateString);
        let age = Math.floor((now - date) / 3.154e+10);

        if (age < 10) {
            return age.toPrecision(1);
        } else if (age < 100) {
            return age.toPrecision(2);
        } else if (age <= 130) {
            return age.toPrecision(3);
        } else {
            return null;
        }
    }
    else {
        return null;
    }
}

export function validateEmail(email) {
    email = email.trim();
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

export function validURL(str) {
    str = str.trim();
    var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
    return !!pattern.test(str);
}

export function checkPassword(pssw, strengthRequired) {
    // strengthRequired -> 0, 1, 2, 3, 4

    var strength = 0;
    if (pssw.match(/[a-z]+/)) {
        strength += 1;
    }
    if (pssw.match(/[A-Z]+/)) {
        strength += 1;
    }
    if (pssw.match(/[0-9]+/)) {
        strength += 1;
    }
    if (pssw.match(/[$@#&!]+/)) {
        strength += 1;

    }

    /*
    if (pssw.length < 6) {
        display.innerHTML = "minimum number of characters is 6";
    }
    */

    /*
    if (pssw.length > 12) {
        display.innerHTML = "maximum number of characters is 12";
    }
    */

    return strength >= strengthRequired;
}
