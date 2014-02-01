<?php
/**
 * Smarty plugin
 * ------------------
 * File: URI.php
 * Type: funciton
 * Name: URI
 * Purpose: URI Generator for kcpr site.
 */

function smarty_function_URI($params, &$smarty) {

   if (!function_exists('current_url')) {
       if (!function_exists('get_instance')) {
           $smarty->trigger_error("url: Cannot load CodeIgniter");
           return;
       }
       $CI = &get_instance();
       $CI->load->helper('url');
   }

   $uris = array(
      'home' => '/',
      'schedule' => '/schedule',
      'charts' => '/charts',
      'archives' => '/charts/archives',
      'contact' => '/contact',
      'about' => '/about',
      'listen' => '/listen'
   );

   $admin = '/admin';
   $adminUris = array(
      'new_charts' => '/manage_charts',
      'edit_charts' => '/manage_charts/edit',
      'submit_charts' => '/manage_charts/submit',
      'schedule' => '/manage_schedule',
      'shows' => '/manage_shows',
      'news' => '/manage_news',
      'logout' => '/logout'
   );

   if (isset($params['page']))
      return site_url($uris[$params['page']]
       . (isset($params['param']) ? '/' . $params['param'] : ''));

   else if (isset($params['adminPage']))
      return site_url($admin . $adminUris[$params['adminPage']]
       . (isset($params['param']) ? '/' . $params['param'] : ''));

   else if (isset($params['css']))
      return base_url() . 'css/' . $params['css'];

   else if (isset($params['js']))
      return base_url() . 'js/' . $params['js'];

   else
      return '';
}
