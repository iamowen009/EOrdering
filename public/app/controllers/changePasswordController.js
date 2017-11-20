(function() {
    'use strict';

    angular
        .module('app')
        .controller('ChangePasswordController', ChangePasswordController);

    /** @ngInject */
    function ChangePasswordController($scope, ChangePassword, Auth) {
        init();

        function init() {
            $scope.btnLoading = false;
            $scope.usersId = Auth.userTypeDesc() != 'Multi' ? Auth.genId() : Customers.customerId();
        }

        $scope.doChangePassword = function(isValid) {
            if (isValid) {
                //$scope.btnLoading = true;

                var formData = {
                    userId: $scope.userId,
                    password: $scope.input.oldpassword,
                    new_password: $scope.input.newpassword,
                };

                ChangePassword.save(formData)
                    .then(function(res) {
                        console.log(res);
                        clearForm();
                    })
                    .catch(function(err) {
                        swal('ไม่สามารถแก้ไขรหัสผ่านได้');
                    }); 
            }
        }

        function clearForm() {
            $scope.input = [];
            $scope.form.$setPristine();
        }
    }
}());