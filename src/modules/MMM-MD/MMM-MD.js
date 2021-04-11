/*
@author: Andrea Grandieri g.andreus02@gmail.com
*/

// Posizione consigliata: "center"

// Funzioni
// - Lettura contenuto "file"
// - Trasformazione contenuto MD in HTML
// - Applicazione contenuto HTML in "drop" (elemento HTML)
function makeEverything(file, drop) {
	var rawFile = new XMLHttpRequest();
	rawFile.open("GET", file, true);
	rawFile.onreadystatechange = function () {
		if (rawFile.readyState === 4) {
			if (rawFile.status === 200 || rawFile.status == 0) {
				var converter = new showdown.Converter();
				var allText = rawFile.responseText;
				var html = converter.makeHtml(allText);
				drop.innerHTML = html;
			}
		}
	};
	rawFile.send(null);
}

Module.register("MMM-MD", {
	// Default module config.
	defaults: {
		// Velocità di scorrimento (ms)
		// Min interval: 45ms
		// Ideal (default) interval: 50ms
		// Max interval: +INFms
		interval: 50,

		// Width (larghezza) del box del modulo
		width: "calc(100 % - 25 %)",

		// Height (altezza) del box del modulo
		height: "500px",

		// Nome del documento contenente il contenuto
		// MD da convertire in HTML (compresa l'estensione)
		// IL DOCUMENTO DEVE ESSERE LOCALIZZATO ALL'INTERNO 
		// DELLA DIR: "modules/MMM-MD/public/"
		docname: "content.md"
	},

	/*
	getScripts: function () {
		// Caricamento libreria da cdn (cdnjs.cloudflare.com)
		return ["https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"];
	},
	*/

	getScripts: function () {
		// Caricamento libreria da locale
		return ["modules/MMM-MD/lib/showdownjs/dist/showdown.min.js"];
	},

	// Override dom generator.
	getDom: function () {
		// Controlli sulla configurazione	
		// "this.config.interval"
		var checkStatus = false;
		if (typeof (this.config.interval) === "number") {
			if (this.config.interval >= 45) {
				checkStatus = true;
			}
		}

		if (!checkStatus) {
			this.config.interval = 50;
		}

		// "this.config.width"
		// "this.config.height"
		// Data la presenza di stringhe, è fondamentalmente
		// impossibile controllare l'esetta correttezza degli input;
		// risulta molto prossimo al futile. Per parametri sbagliati,
		// il riscontro sarà il semplice non-rendering del modulo.

		// "this.config.docname"
		// Data la presenza di stringhe, è fondamentalmente
		// impossibile controllare l'esetta correttezza degli input;
		// risulta molto prossimo al futile. Per parametri sbagliati,
		// il riscontro sarà il riscontro di errori nella localizzazione, 
		// lettura, conversione [...] dei contenuti del documento.

		// content
		var wrapper = document.createElement("div");

		// container
		var bigWrapper = document.createElement("div");

		// Applicazione attributi
		wrapper.setAttribute("class", "content");
		bigWrapper.setAttribute("class", "container");
		bigWrapper.setAttribute("id", "autoScroll");

		// Composizione stringa "style" (Template Literals not available)
		var strStyle = "display:inline-block; width:";
		strStyle += this.config.width + "; margin:0 auto; height:";
		strStyle += this.config.height + "; overflow:hidden;";

		bigWrapper.setAttribute("style", strStyle);

		// Applicazione parentele
		bigWrapper.appendChild(wrapper);

		var doc = "modules/MMM-MD/public/";
		doc += this.config.docname;

		makeEverything(doc, wrapper);

		// Scroll automatico up-down per gestire overflow
		// del contenuto in altezza (height) (*)
		var i = 0;
		var maxima = null;
		var staller = 100;

		// Schedulamento funzione (*)
		window.setInterval(function () {

			// Valore massimo che può assumere "bigWrapper.scrollTop"
			maxima = bigWrapper.scrollHeight - $(bigWrapper).outerHeight() + staller;

			// E' ancora possibile scorrere verso il basso
			if (i < maxima) {
				// SCROLL THE ELEMENT TO THE SCROLL VALUE WITH A SMOOTH BEHAVIOR
				bigWrapper.scrollTo({ top: i, behavior: 'smooth' });
			} else {
				// Scorrimento massimo raggiunto. Ricomincio
				// dall'inizio dall'alto
				i = 0;
				bigWrapper.scrollTop = i;
			}

			// Incremento indice di scorrimento
			i++;

		}, this.config.interval);

		return bigWrapper;
	}
});
