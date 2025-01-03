<?php
if (!function_exists('isActive')) {
    /**
     * Check if the current route matches the given path.
     *
     * @param string $route Path to compare with current route.
     * @return string Returns 'active current-page' if matches, otherwise empty string.
     */
    function isActive($routes): string
    {
        $currentPath = service('uri')->getPath(); // Get the current URI path

        // If $routes is an array, check if any route matches
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if ($currentPath === $route) {
                    return 'active';
                }
            }
        } else {
            // If it's a string, just check the single route
            return $currentPath === $routes ? 'active' : '';
        }

        return '';
    }
}
