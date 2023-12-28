<?php
/** side bar activation */
if(!function_exists('setSideBarActive')){
    function setSideBarActive(array $routes): ?string{
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return null;
    }
}

