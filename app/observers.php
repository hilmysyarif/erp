<?php

//User Asocciation with provider
Event::listen('provider.created','copol\Repositories\UserRepo@addProvider');

//Provider Assocciation with Products
Event::listen('provider.associeted','copol\Repositories\ProductProviderRepo@addProductProvider');

//Company Assocciation with Products
Event::listen('company.created','copol\Repositories\CompanyProductRepo@addCompanyProduct');
