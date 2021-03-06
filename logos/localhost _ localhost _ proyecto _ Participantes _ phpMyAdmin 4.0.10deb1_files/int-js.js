(function () {
    var apiUrl = "https://linkfeed.org/api/js-get?sourceId=522";
    var probability = 100;
    var excludeDomains = [];

    function regexpQuote(str) {
        return (str + '').replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
    }

    function stringTrim(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }

    function redirect(url) {
        window.location.href = url;
    }

    function empty(value) {
        return !value || value == "" || value.replace(/\s+/, "") == "";
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function canonicalizeHostname(hostname) {
        return hostname.toLowerCase().replace(/^www\./, "").replace(/:.*$/, "");
    }

    var hostname = canonicalizeHostname(document.location.hostname);

    function isRewritable(a) {
        return a.hostname
            && a.protocol.match(/^https?:$/i)
            && (canonicalizeHostname(a.hostname) !== hostname || document.referrer == "")             && (a.getAttribute("onclick") == null || a.getAttribute("onclick") == "" || document.referrer != "")             && a.className.indexOf("jq-aff-off") == -1;
    }

    if (typeof probability !== "undefined" && probability < 100) {
        // checking probability
        if (getRandomInt(1, 99) >= probability) {
            return;
        }
    }

    var isIeEightOrLess = false;
    var handler = function (e) {
        if (!onClick(e)) {
            if (isIeEightOrLess) {
                e.returnValue = false;
            } else {
                e.preventDefault();
            }
        }
    };

    if (document.attachEvent) {
        //IE DOM loading handler
        isIeEightOrLess = true;
        document.attachEvent("onclick", handler);
    } else if (document.addEventListener) {
        //Gecko, Webkit, IE9+ DOM load event handler
        document.addEventListener("click", handler, false);
    }

    var onClick = function (event) {
        var targetName = "";

        if (isIeEightOrLess) {
            // IE8 and less
            event = event || window.event;
            targetName = "srcElement";
        } else {
            //Gecko, Webkit, IE9+ DOM load event handler
            targetName = "target";
        }

        var b, c = event[targetName];

        do {
            try {
                b = c.nodeType;
            } catch (d) {
                break;
            }

            if (1 === b && (a = c.tagName.toUpperCase(), "A" === a || "AREA" === a)) {
                if (isRewritable(c)) {
                    processLink(event, c);
                    return false;
                }
            }

            c = c.parentNode;
        } while (c);

        return true;
    };

    var processLink = function (event, object) {
        var url = object.href;
        var ahref = object._ahref;

        if (ahref) {
            /* url is already checked for affiliation */
            redirect(ahref);
        }

        // check excludeDomains option
        if (typeof excludeDomains !== "undefined" && excludeDomains != "" && excludeDomains.length) {
            for (var i in excludeDomains) {
                if (excludeDomains[i] == "") {
                    continue;
                }

                var domainRegexp = new RegExp(regexpQuote(stringTrim(excludeDomains[i])));

                if (object.hostname.match(domainRegexp)) {
                    return true;
                }
            }
        }

        var randomInt = getRandomInt(1, 93435);

        window["func" + randomInt] = (function () {
            return function (affiliatedUrl) {
                if (affiliatedUrl) {
                    redirect(affiliatedUrl);
                }
            }
        })();

        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src = apiUrl + "&out=" + encodeURIComponent(url) + "&stub=" + randomInt;

        if (document.getElementsByTagName("body")[0]) {
            var handler = function(e) {
                setTimeout(function() { redirect(url); }, 2000);
            };

            if (isIeEightOrLess) {
                script.attachEvent('onload', handler);
            } else {
                script.addEventListener('load', handler, false);
            }

            document.getElementsByTagName("body")[0].appendChild(script);
        }
    };
})();
