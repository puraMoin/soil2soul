<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\MenuLink;
use Illuminate\Support\Facades\Validator;

use File;

class MenuLinkController extends BaseController{

     public function getMenuLinks(){
        $menuLinks = MenuLink::with(['children' => function ($query) {
            $query->where('active', true)->orderBy('order', 'asc');
        }])->whereNull('parent_id')->where('active',true)->orderBy('order', 'asc')->get(); // Retrieve all menu links from the database
        return $menuLinks;

        //dd($menuLinks); // Return the menu links
    }

    public function index(){    
        $parentMenu = '';
        $pageTitle = 'Menu Links';

        $menuItems = MenuLink::orderBy('order')->paginate(20);

         // Group the records by parent_id
        $menulinks = $menuItems->groupBy('parent_id');


        return view('menulinks.index',compact('parentMenu','pageTitle','menulinks','menuItems'));
    }

    /*Funtion To Add Menu Link*/
    public function add(){
        $parentMenu = '';
        $parentMenuLinks = MenuLink::whereNull('parent_id')->with('children')->get();
        /*Controller*/
        $controllers = $this->getControllers();
        $pageTitle = "Add";
        

        // dd($parentMenuLinks);

        return view('menulinks.add',compact('parentMenu','parentMenuLinks','controllers','pageTitle'));
    }


    /*Store Method*/
    public function store(Request $request){
       
       // dd($request);

         $request->validate([
             'title' => 'required|string',
             'link' => 'required|string',
             'order' => 'required|int',
         ]);
         
         $user = Auth::user(); // Get the currently authenticated user

        // Create a new MenuLink instance
        $menuLink = new MenuLink();
        $menuLink->order = $request->input('order');
        $menuLink->title = $request->input('title');
        $menuLink->link = $request->input('link');
        $menuLink->parent_id = $request->input('parent_id');
        $menuLink->active = $request->input('active');
        $menuLink->created_by = $user->id;;
        $menuLink->updated_by = $user->id;;

        

        // Save the model, allowing Eloquent to automatically handle timestamps
        $menuLink->save();
        return redirect()->route('menulink.index')->with('success', 'Data saved successfully!');
        // dd($menuLink);

    }

    // Show edit form
    public function edit($id)
    {
        
        $user = Auth::user(); // Get the currently authenticated user

        /*Page Title*/
        $pageTitle = $this->model_name();
        /*Controllers*/
        $controllers = $this->getControllers();

        /*parent Menu Links*/
        $parentMenuLinks = MenuLink::whereNull('parent_id')->with('children')->get();

        // dd($parentMenuLinks);

        /*Select Data As Per ID*/
        $menulinks = MenuLink::find($id);

        return view('menulinks.edit', compact('menulinks','controllers','pageTitle','parentMenuLinks','user'));
    }

     // Update item in the database
    public function update(Request $request, $id)
    {
      
        
     
        $menulink = MenuLink::find($id);
        $menulink->update($request->all());

         // dd($request);

        // $menulink->update([
        // 'parent_id' => $request->input('parent_id'),
        // 'title' => $request->input('title'),
        // 'updated_by' => $request->input('updated_by'),
        // 'link' => $request->input('link'),
        // 'order' => $request->input('order'),
        // 'active' => $request->input('active'),
        // ]);
        // dd($menulink);

        $menulink->save();


        return redirect()->route('menulink.index')->with('success', 'menulink updated successfully');
    }


    /*FOr View Page*/
    public function view($id){
        $pageTitle = $this->model_name();
        $menulink = MenuLink::find($id);

        return view('menulinks.view', compact('menulink','pageTitle'));
    }

    public function model_name(){
        $modelName = 'MenuLink';

        return $modelName;

    }

    public function getControllers(){
        $controllerPath = app_path('Http/Controllers');
        // var_dump($controllerPath);exit;
        $controllers = [];
        foreach (glob("$controllerPath/*.php") as $file) {
            // $controllers[] = ['select Controller'];
            $controllers[] = str_replace('.php', '', basename($file));
        }

        // var_dump($controllers);exit;

        return $controllers;
    }

    public function getAllControllersAndMethods(){
        $controllers = [];

        // Get all routes registered in your application
        $routes = Route::getRoutes();
   
        foreach ($routes as $route) {
            $controllerAction = $route->getAction('controller');
            var_dump($controllerAction);
            // Extract the controller class from the controller action
            if ($controllerAction) {
                $controller = explode('@', $controllerAction)[0];
                 // Get the methods of the controller
                $methods = get_class_methods($controller);

                // Store controller name and its methods
                $controllers[$controller] = $methods;   
            }
        }exit;

        return $controllers;
    }    
    
    /*Get ll Controller*/
    public function getAllControllers(){
        $controllers = [];
        $controllerPath = app_path('Http/Controllers');

        $controllerFiles = File::files($controllerPath);

        foreach ($controllerFiles as $controllerFile) {
            $fileName = pathinfo($controllerFile, PATHINFO_FILENAME);
            $controllerClass = "App\\Http\\Controllers\\{$fileName}";

            if (class_exists($controllerClass)) {
                $controllers[] = $controllerClass;
            }
        }
        return $controllers;
    }

    public function getMethodsForController($controllerName){
        
        $methods = get_class_methods("App\Http\Controllers\\$controllerName");
        return response()->json($methods);

    }



public function getRouteName(Request $request)
{
    $controller = $request->input('controller');
    $method = $request->input('method');
    $controllerPrefix = $this->getControllerPrefix($controller);

    // var_dump($controllerPrefix);
    $routeName = $controllerPrefix . '.' . $method;

    return response()->json(['routeName' => $routeName]);
}


private function getControllerPrefix($controllerName)
{
    // Remove the 'Controller' suffix and convert to snake_case
    $prefix = strtolower(str_replace('Controller', '', $controllerName));

    // var_dump($prefix);

    // You might have specific rules for certain controllers:
    if ($prefix === 'menu_link') {
        return 'menu_links'; // Customize prefixes as needed
    }

    // If no specific rule applies, return the modified controller name
    return $prefix;
}







}
