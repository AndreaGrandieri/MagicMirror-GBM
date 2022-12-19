Module.register("MMM-Online-State", {
    defaults: {
        displayText: false,
        displaySymbol: true,
        symbolOnline: "wifi",
        symbolOffline: "wifi",
        colored: true,
        colorOnline: "#fff",
        colorOffline: "red"
    },
    start: function () {
        window.addEventListener('online', () => this.updateDom());
        window.addEventListener('offline', () => this.updateDom());
    },
    getStyles: function () {
        return ["font-awesome.css"];
    },
    getDom: function () {
        const state = window.navigator.onLine;
        let wrapper = document.createElement("div");
        if (this.config.displaySymbol) {
            let symbolWrapper = document.createElement("div");
            if (this.config.colored) {
                symbolWrapper.style.cssText = "color:" + this.colorForState(state);
            }
            const symbol = this.symbolForState(state);
            const symbolElement = document.createElement("span");
            symbolElement.className = symbol;
            symbolWrapper.appendChild(symbolElement);
            wrapper.appendChild(symbolWrapper);
        }
        if (this.config.displayText) {
            const textElement = document.createElement("div");
            textElement.innerHTML = this.translate(state ? "online" : "offline");
            wrapper.appendChild(textElement);
        }
        return wrapper;
    },
    colorForState: function (state) {
        return state ? this.config.colorOnline : this.config.colorOffline;
    },
    symbolForState: function (state) {
        return state ? this.config.symbolOnline : this.config.symbolOffline;
    }
});
