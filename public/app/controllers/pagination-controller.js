function PaginationController($scope) {
  $scope.pageChangeHandler = function(num) {
    //console.log('going to page ' + num);
  };
}
productApp.controller('PaginationController', PaginationController);
productApp.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(Routing.generate('pagination',true));
});

productApp.value('duScrollOffset', 60);
productApp.value('duScrollDuration', 0);
