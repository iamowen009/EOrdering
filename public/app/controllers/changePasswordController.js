(function() {
    'use strict';

    angular
        .module('app')
        .controller('ChangePasswordController', ChangePasswordController);

    /** @ngInject */
    function ChangePasswordController($scope, ChangePassword, Customers, Auth) {
        init();

        function init() {
            $scope.btnLoading = false;
            $scope.usersId = Auth.userTypeDesc() != 'Multi' ? Auth.genId() : Customers.customerId();
        }

        $scope.doChangePassword = function(isValid) {
            if (isValid) {
                var formData = {
                    //userId: $scope.userId,
                    userName: Auth.username(),
                    password: $scope.input.oldpassword,
                    newPassword: $scope.input.newpassword,
                };

                ChangePassword.save(formData)
                    .then(function(res) {
                        if (res.data.result == 'SUCCESS') {
                            swal('สำเร็จ', 'เปลี่ยนรหัสผ่านสำเร็จ', 'success');
                        } else {
                            swal('เกิดข้อผิดพลาด', 'รหัสผ่านเก่าไม่ถูกต้อง', 'warning');
                        }
                        clearForm();
                    });
            }
        }

        function clearForm() {
            $scope.input = [];
            $scope.form.$setPristine();
        }
    }
}());