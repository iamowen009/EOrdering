(function() {
  'use strict';

  angular
    .module('app')
    .filter('unique', unique);

  function unique() {

    return fn;

    function fn(collection, keyname) {
      var output = [];
      var keys = [];

      angular.forEach(collection, function(item) {
        var key = item[keyname];
        if(keys.indexOf(key) === -1) {
          keys.push(key); 
          output.push(item);
        }
      });

      return output;
    }
  }
}());