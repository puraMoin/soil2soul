<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{

    public function __construct()
    {
        $currentRoute = Route::current();

        // dd($currentRoute);

        $action = (isset($currentRoute->action['as'])) ? $currentRoute->action['as'] : '';

        // dd($currentRoute->parameterNames);
        $parameteresNames = (!empty($currentRoute->parameterNames)) ? $currentRoute->parameterNames['0'] : '';

        // 
        // dd($currentRoute->parameters);

        // dd($action);
        // $parameteres = (!empty($currentRoute->parameters)) ? $currentRoute->parameters['id'] : '';
        if(isset($currentRoute->parameters['id'])){
            $parameteres = $currentRoute->parameters['id'];
        }else{

            $parameteres = (!empty($parameteresNames)) ? $currentRoute->parameters[$parameteresNames] : '';
        }

  



        /*Current Page Name*/
        $currentRouteDetails = Route::currentRouteName();
        $currentRouteDetails = explode('.', $currentRouteDetails);
        $currentPage = end($currentRouteDetails); 
        $PageTitle = reset($currentRouteDetails); 

        // dd($PageTitle);


        view()->share(['action' => $action,'parameteres' => $parameteres,'currentPage'=>$currentPage,'PageTitle'=>$PageTitle,'parameteresNames'=>$parameteresNames]);
    }

}   
