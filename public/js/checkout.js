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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/checkout.js":
/*!**********************************!*\
  !*** ./resources/js/checkout.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="submit"]'); // GET CART LIST

var cart = JSON.parse(localStorage.getItem("cart"));
console.log(cart); // COUNT PLATE DUPLICATES TO SET COUNTER

var counts = cart.reduce(function (acc, value) {
  return _objectSpread(_objectSpread({}, acc), {}, _defineProperty({}, value.name, (acc[value.name] || 0) + 1));
}, {});
console.log(counts); // GET PLATE NAMES

var products = Object.keys(counts);
console.log(products); //GET PLATE INFO THROUGH NAME FIND

var product = cart.find(function (product) {
  return product.name == products[0];
});
console.log(product);
braintree.client.create({
  authorization: 'sandbox_38b6pcrv_9xyqb7hxsmjp4hsm'
}, function (err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  } // Create input fields and add text styles  


  braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'input': {
        'color': '#282c37',
        'font-size': '16px',
        'transition': 'color 0.1s',
        'line-height': '3'
      },
      // Style the text of an invalid input
      'input.invalid': {
        'color': '#E53A40'
      },
      // placeholder styles need to be individually adjusted
      '::-webkit-input-placeholder': {
        'color': 'rgba(0,0,0,0.6)'
      },
      ':-moz-placeholder': {
        'color': 'rgba(0,0,0,0.6)'
      },
      '::-moz-placeholder': {
        'color': 'rgba(0,0,0,0.6)'
      },
      ':-ms-input-placeholder': {
        'color': 'rgba(0,0,0,0.6)'
      },
      // prevent IE 11 and Edge from
      // displaying the clear button
      // over the card brand icon
      'input::-ms-clear': {
        opacity: '0'
      }
    },
    // Add information for individual fields
    fields: {
      number: {
        selector: '#card-number',
        placeholder: '1111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '123'
      },
      expirationDate: {
        selector: '#expiration-date',
        placeholder: '10 / 2019'
      }
    }
  }, function (err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('validityChange', function (event) {
      // Check if all fields are valid, then show submit button
      var formValid = Object.keys(event.fields).every(function (key) {
        return event.fields[key].isValid;
      });

      if (formValid) {
        $('#button-pay').addClass('show-button');
      } else {
        $('#button-pay').removeClass('show-button');
      }
    });
    hostedFieldsInstance.on('empty', function (event) {
      $('header').removeClass('header-slide');
      $('#card-image').removeClass();
      $(form).removeClass();
    });
    hostedFieldsInstance.on('cardTypeChange', function (event) {
      // Change card bg depending on card type
      if (event.cards.length === 1) {
        $(form).removeClass().addClass(event.cards[0].type);
        $('#card-image').removeClass().addClass(event.cards[0].type);
        $('header').addClass('header-slide'); // Change the CVV length for AmericanExpress cards

        if (event.cards[0].code.size === 4) {
          hostedFieldsInstance.setAttribute({
            field: 'cvv',
            attribute: 'placeholder',
            value: '1234'
          });
        }
      } else {
        hostedFieldsInstance.setAttribute({
          field: 'cvv',
          attribute: 'placeholder',
          value: '123'
        });
      }
    });
    submit.addEventListener('click', function (event) {
      // event.preventDefault();
      var forms = document.querySelectorAll('.needs-validation'); // Loop over them and prevent submission

      Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add('was-validated');
        }, false);
      });
      hostedFieldsInstance.tokenize(function (err, payload) {
        if (err) {
          console.error(err);
          return;
        } // This is where you would submit payload.nonce to your server
        // alert('Submit your nonce to your server here!');


        if ($form.checkValidity()) {
          console.log(payload.nonce);
          document.querySelector('#nonce').value = payload.nonce;
          document.getElementById("user_info").submit();
          form.submit();
        }

        return false;
      });
    }, false);
  });
});

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/checkout.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\MAMP\htdocs\laravel\Project-team-4-Deliveboo\resources\js\checkout.js */"./resources/js/checkout.js");


/***/ })

/******/ });