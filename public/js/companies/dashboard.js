/**
 * Created by Nacho on 06-09-14.
 */


function WeeksController($scope, $http) {

//Este código puede ser reducido a sólo una función que haga los tres procesos.
    /*
     |--------------------------------------------------------------------------
     | Current Month
     |--------------------------------------------------------------------------
     |
     */

    $scope.date = moment().format('MMMM YYYY');
    $scope.formatted_date = moment($scope.date).format('YYYY-MM');


    var start_date = moment($scope.date).format('YYYY-MM-DD');
    var end_date = moment($scope.date).add(1, 'months').subtract(1, 'days').format('YYYY-MM-DD');

    $scope.numer = moment($scope.date);


    $http.get('start/' + start_date + '/end/' + end_date).success(function (products) {

            $scope.orders = products;


        }
    );


    /*
     |--------------------------------------------------------------------------
     | Next Month Function
     |--------------------------------------------------------------------------
     |
     */

    $scope.nextMonth = function () {

        $scope.date = moment($scope.date).add(1, 'months').format('MMMM YYYY');
        start_date = moment($scope.date).format('YYYY-MM-DD');
        end_date = moment($scope.date).add(1, 'months').subtract(1, 'days').format('YYYY-MM-DD');

        $http.get('start/' + start_date + '/end/' + end_date).success(function (products) {

                $scope.orders = products;

            }
        );

    };

    /*
     |--------------------------------------------------------------------------
     | Previous Month Function
     |--------------------------------------------------------------------------
     |
     */
    $scope.previousMonth = function () {

        $scope.date = moment($scope.date).subtract(1, 'months').format('MMMM YYYY');
        start_date = moment($scope.date).format('YYYY-MM-DD');
        end_date = moment($scope.date).add(1, 'months').subtract(1, 'days').format('YYYY-MM-DD');
        $http.get('start/' + start_date + '/end/' + end_date).success(function (products) {

                $scope.orders = products;

            }
        );

    };


}



