/* Magic Mirror Config Sample
 *
 * By Michael Teeuw https://michaelteeuw.nl
 * MIT Licensed.
 *
 * For more information on how you can configure this file
 * See https://github.com/MichMich/MagicMirror#configuration
 *
 */

var config = {
	address: "localhost", 	// Address to listen on, can be:
	// - "localhost", "127.0.0.1", "::1" to listen on loopback interface
	// - another specific IPv4/6 to listen on a specific interface
	// - "0.0.0.0", "::" to listen on any interface
	// Default, when address config is left out or empty, is "localhost"
	port: 8080,
	basePath: "/", 	// The URL path where MagicMirror is hosted. If you are using a Reverse proxy
	// you must set the sub path here. basePath must end with a /
	ipWhitelist: ["127.0.0.1", "::ffff:127.0.0.1", "::1"], 	// Set [] to allow all IP addresses
	// or add a specific IPv4 of 192.168.1.5 :
	// ["127.0.0.1", "::ffff:127.0.0.1", "::1", "::ffff:192.168.1.5"],
	// or IPv4 range of 192.168.3.0 --> 192.168.3.15 use CIDR format :
	// ["127.0.0.1", "::ffff:127.0.0.1", "::1", "::ffff:192.168.3.0/28"],

	useHttps: false, 		// Support HTTPS or not, default "false" will use HTTP
	httpsPrivateKey: "", 	// HTTPS private key path, only require when useHttps is true
	httpsCertificate: "", 	// HTTPS Certificate path, only require when useHttps is true

	language: "en",
	logLevel: ["INFO", "LOG", "WARN", "ERROR"], // Add "DEBUG" for even more logging
	timeFormat: 24,
	units: "metric",
	// serverOnly:  true/false/"local" ,
	// local for armv6l processors, default
	//   starts serveronly and then starts chrome browser
	// false, default for all NON-armv6l devices
	// true, force serveronly mode, because you want to.. no UI on this device

	modules: [
		{
			module: "alert",
		},
		{
			module: "updatenotification",
			position: "top_bar"
		},
		{
			module: 'MMM-Online-State',
			// you may choose any location
			position: 'top_right',
			config: {
				displaySymbol: true,
				symbolOnline: "fas fa-globe",
				symbolOffline: "fas fa-globe",
				colored: true,
				colorOnline: "#FFFFFF",
				colorOffline: "#FF0000"
			}
		},
		{
			module: "clock",
			position: "top_left"
		},
		{
			module: "calendar",
			header: "US Holidays",
			position: "top_left",
			config: {
				calendars: [
					{
						symbol: "calendar-check",
						url: "webcal://www.calendarlabs.com/ical-calendar/ics/76/US_Holidays.ics"
					}
				]
			}
		},
		{
			module: "weather",
			position: "top_right",
			config: {
				weatherProvider: "openweathermap",
				units: "metric",
				degreeLabel: true,
				updateInterval: 600000,
				lang: "en",
				initialLoadDelay: 1000,
				onlyTemp: false,
				showHumidity: true,
				showIndoorTemperature: true,
				showIndoorHumidity: true,
				showSun: true,
				colored: true,
				showPrecipitationAmount: true,
				maxNumberOfDays: 5,
				locationID: "3173435",
				apiKey: "f41537e389176cf93d8e0586d0d701ae"
			}
		},
		{
			module: "weatherforecast",
			position: "top_right",
			config: {
				units: "metric",
				updateInterval: 600000,
				lang: "en",
				initialLoadDelay: 1000,
				colored: true,
				showRainAmount: true,
				maxNumberOfDays: 5,
				roundTemp: true,
				locationID: "3173435",
				appid: "f41537e389176cf93d8e0586d0d701ae"
			}
		},
		{
			module: "newsfeed",
			position: "bottom_bar",
			config: {
				feeds: [
					{
						title: "Il Giornale",
						url: "https://www.ilgiornale.it/feed.xml"
					},
					{
						title: "Corriere della sera",
						url: "http://xml2.corriereobjects.it/rss/homepage.xml"
					},
					{
						title: "La Gazzetta dello Sport",
						url: "https://www.gazzetta.it/rss/home.xml"
					}

				],
				showSourceTitle: true,
				showPublishDate: true,
				broadcastNewsFeeds: true,
				broadcastNewsUpdates: true
			}
		},
		{
			module: 'MMM-AirQuality',
			// you may choose any location
			position: 'top_center',
			config: {
				location: 'milan',
				lang: 'eng',
				updateInterval: 30,
				showLocation: true,
				showIndex: true
			}
		},
		{
			module: 'MMM-Screencast',
			// This position is for a hidden <div /> and not the screencast window
			position: 'bottom_right',
			config: {
				position: 'center',
				height: 600,
				width: 1000,
				castName: "MagicMirror-GBM-cast"
			}
		},
		{
			module: 'MMM-ip',
			position: 'bottom_right',
			config: {
				fontSize: 18,
				families: [
					"IPv4"
				],
				types: [
					"wlan0"
				]
			}
		},
		{
			module: "MMM-DHT-Sensor",
			position: "",
			config: {
				sensorPin: 16,
				sensorType: 22,
				units: "metric",
				updateInterval: 10000
			}
		}
	]
};

/*************** DO NOT EDIT THE LINE BELOW ***************/
if (typeof module !== "undefined") { module.exports = config; }
