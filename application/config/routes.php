<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default controller
$route['default_controller'] = 'MyController';  

// Authentication Routes
$route['login'] = 'MyController/login';
$route['login/process'] = 'MyController/process';
$route['admin/logout'] = 'MyController/logout';



// Admin Dashboard Routes
$route['admin'] = 'MyController/admin';

// Slider Routes (CRUD Operations)
$route['admin/slider'] = 'SliderController/slider'; // View all sliders
$route['slider/add'] = 'SliderController/add'; // Add new slider (form submission)
$route['slider/save_slider'] = 'SliderController/save_slider'; // Process for saving a slider
$route['slider/manage_sliders/(:num)'] = 'SliderController/manage_sliders/$1'; // Manage sliders with ID (for editing)
$route['slider/delete_slider/(:num)'] = 'SliderController/delete_slider/$1'; // Delete slider


// about Routes (CRUD Operations)
$route['admin/about'] = 'AboutController/about'; //view all about
$route['about/update_about'] = 'AboutController/update_about';// Process for update a about
$route['download-cv/(:any)'] = 'AboutController/download_cv/$1';


// resume Routes (CRUD Operations)
$route['admin/resume'] = 'ResumeController/resume';
$route['resume/add'] = 'ResumeController/add';
$route['resume/manage_resumes/(:any)'] = 'ResumeController/manage_resumes/$1';
$route['resume/save_resume'] = 'ResumeController/save_resume';
$route['resume/delete_resume/(:any)'] = 'ResumeController/delete_resume/$1';
$route['resume/update_resume'] = 'ResumeController/update_resume';// Process for update a Resume

// service Routes (CRUD Operations)
$route['admin/service'] = 'ServiceController/service';
$route['service/add'] = 'ServiceController/add'; // Ensure form action matches this route
$route['service/manage_services/(:any)'] = 'ServiceController/manage_services/$1'; 
$route['service/manage_services'] = 'ServiceController/manage_services'; // This route can be useful if no ID is passed
$route['service/save_service'] = 'ServiceController/save_service'; // Ensure form action uses this route
$route['service/delete_service/(:any)'] = 'ServiceController/delete_service/$1';
$route['service/update_service'] = 'ServiceController/update_service';

// skill Routes (CRUD Operations)
$route['admin/skill'] = 'SkillController/skill';
$route['skill/add'] = 'SkillController/add'; // Ensure form action matches this route
$route['skill/manage_skills/(:any)'] = 'SkillController/manage_skills/$1'; 
$route['skill/manage_skills'] = 'SkillController/manage_skill'; // This route can be useful if no ID is passed
$route['skill/save_skill'] = 'SkillController/save_skill'; // Ensure form action uses this route
$route['skill/delete_skill/(:any)'] = 'SkillController/delete_skill/$1';
$route['skill/update_skill'] = 'SkillController/update_skill';


// Sskill router (CRUD Operations)
$route['admin/sskill'] = 'SskillController/sskill';
$route['sskill/add'] = 'SskillController/add';
$route['sskill/edit/(:num)'] = 'SskillController/edit/$1';
$route['sskill/update/(:num)'] = 'SskillController/update/$1';
$route['sskill/delete/(:num)'] = 'SskillController/delete/$1';

 //contact Routes (CRUD Operations)
$route['admin/contact'] = 'ContactController/contact';
$route['contact/add'] = 'ContactController/add'; // Ensure form action matches this route
$route['contact/manage_contacts/(:any)'] = 'ContactController/manage_contacts/$1'; 
$route['contact/manage_contacts'] = 'ContactController/manage_contacts'; // This route can be useful if no ID is passed
$route['contact/save_contact'] = 'ContactController/save_contact'; // Ensure form action uses this route
$route['contact/delete_contact/(:any)'] = 'ContactController/delete_contact/$1';
$route['contact/update_contact'] = 'ContactController/update_contact';
$route['admin/update_hcontact/(:num)'] = 'ContactController/update_hcontact/$1';





// email management routes
$route['admin/email_form'] = 'ContactController/email_form'; // Change to your actual controller name
$route['admin/send_email'] = 'ContactController/send_email'; // Change to your actual controller name




$route['admin/site-settings'] = 'SiteSettingsController/index'; // Route for displaying the site settings page (Links and Navbar)

// ---------------- Navbar Routes ---------------- //

$route['navbar/add'] = 'SiteSettingsController/add'; // Handles the add action
$route['navbar/edit/(:num)'] = 'SiteSettingsController/edit/$1'; // Handles the edit action for a specific navbar item
$route['navbar/update/(:num)'] = 'SiteSettingsController/update/$1'; // Handles the update action for a specific navbar item
$route['navbar/delete/(:num)'] = 'SiteSettingsController/delete/$1'; // Handles the delete action for a specific navbar item


// Navbar CRUD routes
// $route['admin/navbar/add'] = 'SiteSettingsController/addNavbar';
// $route['admin/navbar/update/(:num)'] = 'SiteSettingsController/updateNavbar/$1';
// $route['admin/navbar/delete/(:num)'] = 'SiteSettingsController/deleteNavbar/$1';

// ---------------- Links Routes ---------------- //
$route['admin/add-link'] = 'SiteSettingsController/add_link'; // Route for adding a new link
$route['admin/update-link/(:num)'] = 'SiteSettingsController/update_link/$1'; // Route for updating a link (with ID)
$route['admin/delete-link/(:num)'] = 'SiteSettingsController/delete_link/$1'; // Route for deleting a link (with ID)

// ---------------- Footer Routes ---------------- //
$route['admin/update-footer/(:num)'] = 'SiteSettingsController/update_footer/$1'; // Adjust according to your controller name






// 404 Error Handling
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
