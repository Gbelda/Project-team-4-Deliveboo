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

var token = document.getElementById('token').value;
var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="button"]'); // GET CART ARRAY

var cart = JSON.parse(localStorage.getItem("cart"));
console.log(cart, 'log 1');
var restaurant = JSON.parse(localStorage.getItem('restaurant'));
console.log(restaurant); // TARGET DOM CART LIST

var cart_list = document.getElementById('cart_list');
console.log(cart_list, 'log 2'); // COUNT PLATE DUPLICATES TO SET COUNTER

var countsObject = cart.reduce(function (acc, value) {
  return _objectSpread(_objectSpread({}, acc), {}, _defineProperty({}, value.name, (acc[value.name] || 0) + 1));
}, {});
console.log(countsObject, 'log 3'); // GET PLATE NAMES

var products = Object.keys(countsObject);
console.log(products, 'log 4'); //GET PLATE COUNTS

var counts = Object.values(countsObject);
console.log(counts, 'log counts'); //Assign to DOM element

if (products != '') {
  cart_list.insertAdjacentHTML('afterbegin', "<li class=\"list-group-item d-flex justify-content-between align-items-center lh-condensed\"><h5 class='m-0'>".concat(restaurant.restaurant_name, "</h5>\n            <h5 class='d-flex align-items-center justify-content-end m-0'>\n                <input type=\"hidden\" name=\"restaurant_id\" readonly class=\" form-control-plaintext p-0\" id=\"restaurant_id\" value=\"").concat(restaurant.id, "\">\n            </h5>\n        </li>"));

  var _loop = function _loop(i) {
    //GET PLATE INFO THROUGH NAME FIND
    product = cart.find(function (product) {
      return product.name == products[i];
    });
    console.log(product, 'log 5');
    cart_list.insertAdjacentHTML('beforeend', " <li class= \"list-group-item d-flex justify-content-between lh-condensed\" >\n                <div>\n                    <h6 class=\"my-0 fw-bold text-start\">".concat(product.name, "</h6>\n                    <small class=\" d-flex align-items-center\">\n                        Quantit&aacute;: \n                        <input type=\"text\" name=\"plates[").concat(product.id, "]\" readonly class=\"form-control-plaintext ps-1\" id=\"count\" value=\"").concat(counts[i], "\" data-id='").concat(product.id, "'>\n                    </small>\n                </div>\n                <span class=\"text-muted\">&euro;").concat(Math.round((product.price * counts[i] + Number.EPSILON) * 100) / 100, "</span>\n                </li >"));
  };

  for (var i = 0; i < products.length; i++) {
    var product;

    _loop(i);
  }

  var total = 0;

  for (var _i = 0; _i < cart.length; _i++) {
    total = total + parseFloat(cart[_i].price);
  }

  cart_list.insertAdjacentHTML('beforeend', "<li class=\"list-group-item d-flex justify-content-between align-items-center lh-condensed\"><h5 class='m-0'>Totale:</h5>\n            <h5 class='d-flex align-items-center justify-content-end m-0'>\n                &euro;\n                <input type=\"text\" name=\"total\" readonly class=\" form-control-plaintext p-0\" id=\"total\" value=\"".concat(Math.round((total + Number.EPSILON) * 100) / 100, "\">\n            </h5>\n        </li>"));
} else {
  cart_list.insertAdjacentHTML('beforeend', "<em class=\"text-danger\">Il carrello e vuoto</em>");
}

braintree.client.create({
  authorization: token
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
    var forms = document.querySelector('.needs-validation');
    submit.addEventListener('click', function (event) {
      forms.checkValidity();

      if (forms.checkValidity()) {
        hostedFieldsInstance.tokenize(function (err, payload) {
          if (err) {
            console.error(err);
            return;
          } // This is where you would submit payload.nonce to your server
          // alert('Submit your nonce to your server here!');


          document.querySelector('#nonce').value = payload.nonce;
          document.getElementById("user_info").submit();
        });
      } else if (!forms.checkValidity()) {
        // document.getElementById('client_phone').reportValidity();
        // document.getElementById('client_address').reportValidity();
        // document.getElementById('client_email').reportValidity();
        // document.getElementById('client_lastname').reportValidity();
        // document.getElementById('client_name').reportValidity();
        forms.reportValidity();
      }
    }, false); // })
    // }, false);
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