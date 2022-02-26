/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/chart.js":
/*!*******************************!*\
  !*** ./resources/js/chart.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var chartBarOrders = document.getElementById("chartBarOrders").getContext("2d");
var chartLineOrders = document.getElementById("chartLineOrders").getContext("2d");
var chartBarSales = document.getElementById("chartBarSales").getContext("2d");
var chartLineSales = document.getElementById("chartLineSales").getContext("2d"); // Global Options

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = "#777";
var barChartOrders = new Chart(chartBarOrders, {
  type: "bar",
  // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: ["Febbraio 2021", "Marzo 2021", "Aprile 2021", "Maggio 2021", "Giugno 2021", "Luglio 2021", "Agosto 2021", "Settembre 2021", "Ottobre 2021", "Novembre 2021", "Dicembre 2021", "Gennaio 2022"],
    datasets: [{
      label: "Ordini",
      data: [// somma ciclo for
      110505, 110000, 153060, 126519, 195162, 165072, 150594, 180045, 155060, 210519, 200535, 189899],
      backgroundColor: ["rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)", "rgba(75, 192, 192, 0.6)", "rgba(153, 102, 255, 0.6)", "rgba(255, 159, 64, 0.6)", "rgba(255, 99, 132, 0.6)", "rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)", "rgba(75, 192, 192, 0.6)", "rgba(153, 102, 255, 0.6)"],
      borderWidth: 1,
      borderColor: "#777",
      hoverBorderWidth: 3,
      hoverBorderColor: "#000"
    }]
  },
  options: {
    title: {
      display: true,
      text: "Le statistiche dei tuoi ordini negli ultimi 12 mesi",
      fontSize: 25
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#000"
      }
    },
    layout: {
      padding: {
        left: 50,
        right: 0,
        bottom: 0,
        top: 0
      }
    },
    tooltips: {
      enabled: true
    }
  }
});
var lineChartOrders = new Chart(chartLineOrders, {
  type: "line",
  // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: ["Febbraio 2021", "Marzo 2021", "Aprile 2021", "Maggio 2021", "Giugno 2021", "Luglio 2021", "Agosto 2021", "Settembre 2021", "Ottobre 2021", "Novembre 2021", "Dicembre 2021", "Gennaio 2022"],
    datasets: [{
      label: "Ordini",
      data: [// somma ciclo for
      110505, 110000, 153060, 126519, 195162, 165072, 150594, 180045, 155060, 210519, 200535, 189899],
      backgroundColor: ["rgba(54, 162, 235, 0.6)"],
      borderWidth: 1,
      borderColor: "red",
      hoverBorderWidth: 3,
      hoverBorderColor: "#000"
    }]
  },
  options: {
    title: {
      display: true,
      text: "Le statistiche dei tuoi ordini negli ultimi 12 mesi",
      fontSize: 25
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#000"
      }
    },
    layout: {
      padding: {
        left: 50,
        right: 0,
        bottom: 0,
        top: 0
      }
    },
    tooltips: {
      enabled: true
    }
  }
});
var barChartSales = new Chart(chartBarSales, {
  type: "bar",
  // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: ["Febbraio 2021", "Marzo 2021", "Aprile 2021", "Maggio 2021", "Giugno 2021", "Luglio 2021", "Agosto 2021", "Settembre 2021", "Ottobre 2021", "Novembre 2021", "Dicembre 2021", "Gennaio 2022"],
    datasets: [{
      label: "Ricavato",
      data: [// somma ciclo for
      552525, 502520, 765300, 632595, 975810, 825360, 752970, 900225, 775300, 1052595, 1002675, 949495],
      //backgroundColor:'green',
      backgroundColor: ["rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)", "rgba(75, 192, 192, 0.6)", "rgba(153, 102, 255, 0.6)", "rgba(255, 159, 64, 0.6)", "rgba(255, 99, 132, 0.6)", "rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)", "rgba(75, 192, 192, 0.6)", "rgba(153, 102, 255, 0.6)"],
      borderWidth: 1,
      borderColor: "#777",
      hoverBorderWidth: 3,
      hoverBorderColor: "#000"
    }]
  },
  options: {
    title: {
      display: true,
      text: "Le statistiche del tuo ricavato negli ultimi 12 mesi",
      fontSize: 25
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#000"
      }
    },
    layout: {
      padding: {
        left: 50,
        right: 0,
        bottom: 0,
        top: 0
      }
    },
    tooltips: {
      enabled: true
    }
  }
});
var lineChartSales = new Chart(chartLineSales, {
  type: "line",
  // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: ["Febbraio 2021", "Marzo 2021", "Aprile 2021", "Maggio 2021", "Giugno 2021", "Luglio 2021", "Agosto 2021", "Settembre 2021", "Ottobre 2021", "Novembre 2021", "Dicembre 2021", "Gennaio 2022"],
    datasets: [{
      label: "Ricavato",
      data: [// somma ciclo for
      552525, 502520, 765300, 632595, 975810, 825360, 752970, 900225, 775300, 1052595, 1002675, 949495],
      backgroundColor: ["rgba(54, 162, 235, 0.6)"],
      borderWidth: 1,
      borderColor: "red",
      hoverBorderWidth: 3,
      hoverBorderColor: "green"
    }]
  },
  options: {
    title: {
      display: true,
      text: "Le statistiche del tuo ricavato negli ultimi 12 mesi",
      fontSize: 25
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#000"
      }
    },
    layout: {
      padding: {
        left: 50,
        right: 0,
        bottom: 0,
        top: 0
      }
    },
    tooltips: {
      enabled: true
    }
  }
});

/***/ }),

/***/ 5:
/*!*************************************!*\
  !*** multi ./resources/js/chart.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! H:\MAMP\Boolean\Project-team-4-Deliveboo\resources\js\chart.js */"./resources/js/chart.js");


/***/ })

/******/ });