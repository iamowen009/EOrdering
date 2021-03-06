"use strict";
angular.module('app')

.service('Auth', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{

    var username = '';
    var isAuthenticated = false;
    var role = '';

	return {
		/**
		* Fetch all products
		*/
		login: function (name,pw){
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'Login';

            $http.post( url ,{userName : name,password : pw}).then(function (data) {
                deferred.resolve(data);
            },function (error){
            	deferred.reject('An error occured while fetching all products');
   			});

        	return deferred.promise;
		},
        storeUserCredentials: function(role,username,userId,tokenId,userTypeDesc){
            //isAuthenticated = true;
            //role = role;
            //username = username;
            window.localStorage.setItem('isAuthenticated',true);
            window.localStorage.setItem('role',role);
            window.localStorage.setItem('username',username);
            window.localStorage.setItem('userId',userId);
            window.localStorage.setItem('tokenId',tokenId);
            window.localStorage.setItem('userTypeDesc',userTypeDesc);
            if( userTypeDesc != 'Multi'){
                var customers = {};
                var deferred = $q.defer();
                var url = API_URL + 'Customer?userId='+1;

                  $http.get( url ).then(function (response) {
                    if(response.data.result=='SUCCESS'){
                        customers = response.data.data.customerList;
                        customers = getResult(customers,'customerName','customerCode',username);
                        window.localStorage.setItem('custId', angular.toJson(customers[0]) );
                        console.log('customers = ' + angular.toJson(customers[0]));
                        window.location.href= _base + '/home'
                    }
                },function (error){
                      deferred.reject('An error occured while fetching all products');
                });
                function getResult(results,keyToFilter,keyToFilter2, valueStartsWith){
                      return _.filter(results, function(d){ return d[keyToFilter].indexOf(valueStartsWith)!=-1 || d[keyToFilter2].indexOf(valueStartsWith)!=-1; })
                }

          }else{
            window.location.href= _base + '/customer'
          }

        },
        genId : function(){
          var cid =  window.localStorage.getItem('custId');
          var res = JSON.parse( cid );
          return res ? res.customerId : '';
        },
        customerName : function(){
          var customer =  window.localStorage.getItem('custId');
          var res = JSON.parse( customer );
          return res ? res.customerName : '';
        },
        isAuthorized: function(){
            console.log('isAuthenticated',isAuthenticated);
            return window.localStorage.getItem('isAuthenticated');
        },
        role:function(){
            return window.localStorage.getItem('role');
        },
        username:function(){
            return window.localStorage.getItem('username');
        },
        userId:function(){
            return window.localStorage.getItem('userId');
        },
        tokenId:function(){
            return window.localStorage.getItem('tokenId');
        },
        userTypeDesc:function(){
            return window.localStorage.getItem('userTypeDesc');
        },
        logout: function(){
            username = '';
            role='';
            isAuthenticated = false;
            //window.localStorage.removeItem('role');
            //window.localStorage.removeItem('name');
            window.localStorage.clear();
            window.location = _base;//"./";
        }



	}

}])

.service('Config', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    var partImgLogin = '';
    var partImgHome = '';
    var partImgProduct = '';
    var partImgPromotion = '';
    var partImgDocument = '';
    var partImgActivity = '';
    var partFileProduct = '';
    var partFilePromotion = '';
    var partFileDocument = '';
    var imgLogin1 = '';
    var imgLogin2 = '';
    var imgLogin3 = '';
    var imgHome1 = '';
    var imgHome2 = '';
    var imgHome3 = '';


	return {
		/**
		* Fetch all products
		*/
		fetchAll: function (userId)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'Config';
            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
        setPath:function(partImgLogin,partImgHome,partImgProduct,partImgPromotion,partImgDocument,partImgActivity,partFileProduct,partFilePromotion,partFileDocument){

            partImgProduct = partImgProduct;
            partImgPromotion = partImgPromotion;
            partImgDocument = partImgDocument;
            partImgActivity = partImgActivity;
            partFileProduct = partFileProduct;
            partFilePromotion = partFilePromotion;
            window.localStorage.setItem('partImgLogin',partImgLogin);
            window.localStorage.setItem('partImgHome',partImgHome);
            window.localStorage.setItem('partFileDocument',partFileDocument);
            window.localStorage.setItem('partImgProduct',partImgProduct);
            window.localStorage.setItem('partImgPromotion',partImgPromotion);
        },
        setLoginImage:function(imgLogin1,imgLogin2,imgLogin3){
            window.localStorage.setItem('imgLogin1',imgLogin1);
            window.localStorage.setItem('imgLogin2',imgLogin2);
            window.localStorage.setItem('imgLogin3',imgLogin3);
        },
        setHomeImage:function(imgHome1,imgHome2,imgHome3){
            window.localStorage.setItem('imgHome1',imgHome1);
            window.localStorage.setItem('imgHome2',imgHome2);
            window.localStorage.setItem('imgHome3',imgHome3);
        },
        partImgLogin : function(){
            return window.localStorage.getItem('partImgLogin');
        },
        partImgHome : function(){
            return window.localStorage.getItem('partImgHome');
        },
        partImgProduct : function(){
            return window.localStorage.getItem('partImgProduct');
        },
        partImgProductList : function(){
            return window.localStorage.getItem('partImgProduct') + '/ProductList';
        },
        partImgProductDetail : function(){
            return window.localStorage.getItem('partImgProduct') + '/ProductDetail';
        },
        partImgProductCard : function(){
            return window.localStorage.getItem('partImgProduct') + '/ProductCard';
        },
        partImgProductOrder : function(){
            return window.localStorage.getItem('partImgProduct') + '/OrderDetail';
        },
        partImgPromotion : function(){
            return window.localStorage.getItem('partImgPromotion');
        },
        partImgActivity : function(){
            return partImgActivity;
        },
        partFileProduct : function(){
            return partFileProduct;
        },
        partFilePromotion : function(){
            return partFilePromotion;
        },
        partFileDocument : function(){
            return window.localStorage.getItem('partFileDocument');
        },
        imgLogin1 : function(){
            return window.localStorage.getItem('imgLogin1');
        },
        imgLogin2 : function(){
            return window.localStorage.getItem('imgLogin2');
        },
        imgLogin3 : function(){
            return window.localStorage.getItem('imgLogin3');
        },
        imgHome1 : function(){
            return window.localStorage.getItem('imgHome1');
        },
        imgHome2 : function(){
            return window.localStorage.getItem('imgHome2');
        },
        imgHome3 : function(){
            return window.localStorage.getItem('imgHome3');
        }

	}

}])

.service('Customers', ['$http', '$q', 'API_URL','Auth', function($http, $q, API_URL,Auth)
{
	return {
		items: [],

		/**
		* Fetch all products
		*/
		fetchAll: function (userId)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'Customer?userId='+userId;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
		fetchOne: function (userId)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'CustomerInfo?customerId='+userId;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
        setCustomer: function(customerId, customerName, customerCode){
            window.localStorage.setItem('customerId',customerId);
            window.localStorage.setItem('customerName',customerName);
            
            if (customerCode != undefined) {
                window.localStorage.setItem('customerCode', customerCode);
            }

        },
        customerId: function(){
            return Auth.userTypeDesc() == 'Multi' ? window.localStorage.getItem('customerId') : Auth.genId();
        },
        customerName: function(){
            return Auth.userTypeDesc() == 'Multi' ? window.localStorage.getItem('customerName') : Auth.customerName();
        },
        customerCode: function() {
            return window.localStorage.getItem('customerCode');
        },
        customerUpdate: function(formData) {
            var deferred = $q.defer();
            var url = API_URL + 'CustomerUpdate';
    
            $http.post( url , formData).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        customerProblem: function(formData) {
            var deferred = $q.defer();
            var url = API_URL + 'CustomerProblem';
    
            $http.post( url , formData).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        }
	}

}])

.service('Orders', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all promotion
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderPrepare';

            $http.get( url , { params: {customerId: customerId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        addOrder: function (order){
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Order';

            $http.post( url ,{order : order}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        fetchOne: function (orderId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderInfo';

            $http.get( url , { params: {orderId: orderId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        fetchHistory: function (orderId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderHistory';

            $http.get( url , { params: {orderId: orderId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching order history');
            });

            return deferred.promise;
        }

    }

}])

.service('Promotions', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
	return {
		items: [],
		/**
		* Fetch all promotion
		*/
		fetchAll: function (customerId,marketingCodeList,brandCodeList,typeCodeList)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'Promotion';

            $http.get( url , { params: {customerId: customerId, marketingCodeList: marketingCodeList, brandCodeList: brandCodeList, typeCodeList: typeCodeList}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
        fetchOne: function (promotionId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'PromotionInfo';

            $http.get( url , { params: {promotionId: promotionId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        validate: function (promotionId,cartList)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'PromotionValidate';

            //$http.get( url , { params: {promotionId: promotionId,cartList:cartList}}).then(function (data) {
            $http.post( url , {promotionId: promotionId,cartList:cartList}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while validate promotion');
            });

            return deferred.promise;
        }

	}

}])

.service('Marketings', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all marketing
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Marketing';

            $http.get( url , { params: {customerId: customerId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('Brands', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all brands
        */
        fetchAll: function (categoryId,customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Brand';

            $http.get( url , { params: {categoryId: categoryId, customerId: customerId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all brands');
            });

            return deferred.promise;
        },

    }

}])

.service('Types', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all types
        */
        fetchAll: function (categoryId,customerId,brandId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Type';

            $http.get( url , { params: {customerId: customerId,categoryId: categoryId,brandId:brandId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all types');
            });

            return deferred.promise;
        },

    }

}])

.service('Products', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
	return {
		items: [],


		/**
		* Fetch all products
		*/
		fetchAll: function (customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView=false)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + 'Product';

            $http.get( url ,{ params: {customerId: customerId, marketingCodeList: marketingCodeList, brandCodeList: brandCodeList, typeCodeList: typeCodeList,isBTFView:isBTFView }}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
		/**
		* Fetch one products
		*/
		fetchOne: function (customerId, btf)
		{
			// TODO: remove the use of futures
			var deferred = $q.defer();
			var url = API_URL + `ProductInBTF?customerId=${customerId}&btf=${btf}`
            $http.get( url).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

        	return deferred.promise;
		},
        /**
        * Fetch all products
        */
        fetchHistory: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'ProductInOrder';

            $http.get( url ,{ params: {customerId: customerId }}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

	}

}])

.service('Carts', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all marketing
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Cart';

            $http.get( url , { params: {customerId: customerId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

        addCart: function (cartList,promotionList){
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Cart';

            $http.post( url ,{cartList : cartList,promotionList : promotionList}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

        updateCart: function (cartList,promotionList){
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'UpdateCart';

            $http.post( url ,{cartList : cartList,promotionList : promotionList}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        removeCart: function (cartList){
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'RemoveCart';

            $http.post( url ,{cartList : cartList}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('Fav', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all marketing
        */

        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Favorites';

            $http.get( url , { params: {customerId: customerId}}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },
        addFav: function (favoriteInfo)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Favorites';

            $http.post( url ,{favoriteInfo : favoriteInfo}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

        removeFav: function (favoriteInfo){
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'RemoveFavorites';

            $http.post( url ,{favoriteInfo : favoriteInfo}).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('Documents', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchAll: function ()
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'GeneralDocument';

            $http.get( url).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('SaleGroups', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'SaleGroup?customerId='+customerId;

            $http.get( url).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('CustomerArea', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'CustomerArea?customerId='+customerId;

            $http.get( url).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all products');
            });

            return deferred.promise;
        },

    }

}])

.service('OrderPrecess', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchAll: function (customerId,start,end)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderPrecess?customerId='+ customerId
                              + '&startDocumentDate=' + start
                              + '&endDocumentDate=' + end;

            $http.get( url).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all order proecess');
            });

            return deferred.promise;
        },

    }

}])

.service('OrderInfo', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchAll: function (customerId,start,end)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderInfo?customerId='+customerId
                              + '&startDocumentDate=' + start
                              + '&endDocumentDate=' + end;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all order info');
            });

            return deferred.promise;
        },

    }

}])

.service('OrderPrecessInfo', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchOne: function (saleOrderNumber)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderPrecessInfo?saleOrderNumber='+saleOrderNumber;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured  Order Precess Info ');
            });

            return deferred.promise;
        },

    }

}])

.service('OrderProcessTracking', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all products
        */
        fetchOne: function (saleOrderNumber)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderProcessTracking?saleOrderNumber='+saleOrderNumber;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured  Order Precess tracking ');
            });

            return deferred.promise;
        },

    }

}])

.service('OrderBillHistory', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        fetchOne: function (saleOrderNumber)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'OrderHistory?saleOrderNumber='+saleOrderNumber;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured  Order Precess Info ');
            });

            return deferred.promise;
        },

    }

}])

.service('Separations', ['$http', '$q', 'API_URL', function($http, $q, API_URL)
{
    return {
        items: [],
        /**
        * Fetch all separations
        */
        fetchAll: function (customerId)
        {
            // TODO: remove the use of futures
            var deferred = $q.defer();
            var url = API_URL + 'Separations?customerId='+customerId;

            $http.get( url ).then(function (data) {
                deferred.resolve(data);
            },function (error){
                deferred.reject('An error occured while fetching all separations');
            });

            return deferred.promise;
        },

    }

}])

.service('ChangePassword', ['$http', '$q', 'API_URL', function($http, $q, API_URL) 
{
    return {
        save: function(formData) {
            var deferred = $q.defer();
            var url = API_URL + 'ChangePassword';

            $http.post(url, formData).then(function(data) {
                deferred.resolve(data);
            }, function(err) {
                deferred.reject('An error occured while fetching all separations');
            });

            return deferred.promise;
        }
    }
}]);