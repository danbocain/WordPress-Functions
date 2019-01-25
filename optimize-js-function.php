
//Defer Pasing JavaScript for entire website and all plugins, but without jQuery.js
//"async" can be changed to  to "defer". $files will be excluded
function wdo_defer_parsing_of_js($url)
{
    $files = array('jquery.js');  //Specify which files to EXCLUDE from defer method. Always add jquery.js

    
    

//Doesnt effect admins

if (!is_admin()) {
        if (false === strpos($url, '.js')) {
            return $url;
        }

        foreach ($files as $file) {
            if (strpos($url, $file)) {
                return $url;
            }
        }
    } else {
        return $url;
    }
    return "$url' defer='defer";

}
add_filter('clean_url', 'wdo_defer_parsing_of_js', 11, 1);
