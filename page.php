<?php
$module = $_GET['module'];
$modulecase = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1);

error_reporting(0);
$modul = $_GET['module'];
if (!isset($modul))$modul = 'dashboard';
switch($modul)
{
	/*--default template--*/
	case 'dashboard'                  : include 'module/dashboard.php'; break;
	case 'course'                     : include 'module/course.php'; break;
	case 'viewCourse'                 : include 'module/viewCourse.php'; break;
	case 'logout'                     : include 'module/logout.php'; break;
	case 'userProfile'                : include 'module/user_profile.php'; break;
	case 'changePassword'             : include 'module/change_password.php'; break;
	case 'delete'.ucfirst($modulecase): include 'module/delete.php'; break;
	case 'list'.ucfirst($modulecase)  : include 'module/list.php'; break;
	case 'followed_course'            : include 'config/followed_course.php'; break;
	/*--config--*/
	case 'password'                   : include 'config/change_password.php'; break;
	case 'simpan'                     : include 'config/add.php'; break;
	case 'update'                     : include 'config/update.php'; break;
	case 'eraseFunction'              : include 'config/delete_function.php'; break;
	/*--role--*/
	case 'addRole'                    : include 'role/add.php'; break;
	case 'detailRole'                 : include 'role/detail.php'; break;
	case 'updateRole'                 : include 'role/update.php'; break;
	/*--user--*/
	case 'addUser'                    : include 'user/add.php'; break;
	case 'detailUser'                 : include 'user/detail.php'; break;
	case 'updateUser'                 : include 'user/update.php'; break;
	/*--course--*/
	case 'addCourse'                  : include 'course/add.php'; break;
	case 'detailCourse'               : include 'course/detail.php'; break;
	case 'updateCourse'               : include 'course/update.php'; break;
	/*--privillege--*/
	case 'addPrivillege'              : include 'privillege/add.php'; break;
	case 'detailPrivillege'           : include 'privillege/detail.php'; break;
	case 'updatePrivillege'           : include 'privillege/update.php'; break;
	/*--privillege--*/
	case 'addSysparam'                : include 'sysparam/add.php'; break;
	case 'detailSysparam'             : include 'sysparam/detail.php'; break;
	case 'updateSusparam'             : include 'sysparam/update.php'; break;

}