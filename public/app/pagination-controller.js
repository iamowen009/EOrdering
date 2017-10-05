function PaginationController($scope) {
  $scope.pageChangeHandler = function(num) {
    //console.log('going to page ' + num);
  };
}
"use strict";
app.controller('PaginationController', PaginationController);
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(Routing.generate('pagination',true));
});
