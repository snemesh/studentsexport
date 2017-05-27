/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
/***/ (function(module, exports) {

//
// alert("fdsf");
// function buttonClicked()
// {
//
//     var arr=$('input:checkbox:checked').map(function() {return this.value ;}).get();
//     $('#arrayOfids').attr('value',arr);
//     alert($('#arrayOfids').attr('value'));
//
// }
/**
 * Created by snemesh on 3/22/17.
 */

$(document).on('change', '#check, #checkAll ', function () {

    var $this = $(this),
        $chks = $(document.getElementsByName("body")),
        $all = $chks.filter(".chk-all");

    if ($this.hasClass('chk-all')) {
        $chks.prop('checked', $this.prop('checked'));
    } else switch ($chks.filter(":checked").length) {
        case +$all.prop('checked'):
            $all.prop('checked', false).prop('indeterminate', false);
            break;
        case $chks.length - !!$this.prop('checked'):
            $all.prop('checked', true).prop('indeterminate', false);
            break;
        default:
            $all.prop('indeterminate', true);
    }

    var arrayOfIDs = $('input:checkbox:checked').map(function () {
        return this.value;
    }).get();
    $('#arrayOfids').attr('value', arrayOfIDs);
});

// $("#checkid").bind('click', function(){
//     var arreyOfIDs = $('input:checkbox:checked').map(function() {return this.value ;}).get();
//     $('#arrayOfids').attr('value',arreyOfIDs);
// });

/***/ })

/******/ });