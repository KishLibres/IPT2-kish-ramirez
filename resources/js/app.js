/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


require('./components/Routers');

// Expose page initializers when needed in blade views
try {
  const dash = require('./app/pages/dashboard');
  const fac = require('./app/pages/faculty');
  const stu = require('./app/pages/students');
  const set = require('./app/pages/settings');
  window.AdminPages = {
    initDashboard: dash.initDashboard,
    initFacultyPage: fac.initFacultyPage,
    initStudentsPage: stu.initStudentsPage,
    initSettings: set.initSettings,
  };
} catch (e) {
  // ignore if modules not found during early builds
}
