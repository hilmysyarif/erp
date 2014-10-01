

function BanksController($scope, $http) {


    /*
     |--------------------------------------------------------------------------
     |Get Banks
     |--------------------------------------------------------------------------
     |
     */

    $http.get('banks/getall').success(function (banks) {

            $scope.banks = banks;


        }
    );


    /*
     |--------------------------------------------------------------------------
     | Add new bank
     |--------------------------------------------------------------------------
     |
     */

    $scope.addBank = function () {

           var bank = { name: $scope.newBank  };

        //save it in the DB
        $http.post('banks', bank).success(function (bank) {

               //push to the banks array
               $scope.banks.push(bank);


           }
       );

        //Erase the newBank field
        $scope.newBank = "";


    };

    /*
     |--------------------------------------------------------------------------
     | Delete Bank
     |--------------------------------------------------------------------------
     |
     */
    $scope.deleteBank = function (id) {

        //Delete from the DB

        $http.delete('banks/' + id).success(function (bank) {

                //Delete from the array
                for (var i = 0; i < $scope.banks.length; i++)
                    if ($scope.banks[i].id && $scope.banks[i].id === id) {
                        $scope.banks.splice(i, 1);
                        break;
                    }

            }
        );
   //Erase the newBank field
        $scope.newBank = "";


    };


}