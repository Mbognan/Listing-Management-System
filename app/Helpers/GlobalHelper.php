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


/**get yt Thumbnail */
if(!function_exists('getYtThumbnail')){
    function getYtThumbnail(string $url):?string {
       $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

       if(preg_match($pattern,$url,$matches)){
         $id = $matches[1];
        return "https://img.youtube.com/vi/$id/mqdefault.jpg";
       }else{
        return null;
       }
    }
}

/** Title truncate */

if(!function_exists('truncate')){
    function truncate(string $text, int $limit = 25):?string {

        return \Str::of($text)->limit($limit);
    }
}


