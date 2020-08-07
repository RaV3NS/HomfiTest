/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// Leaflet css + icons pack
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
delete L.Icon.Default.prototype._getIconUrl;

// Reset the main icons
L.Icon.Default.mergeOptions({
    iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
    iconUrl: require('leaflet/dist/images/marker-icon.png'),
    shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

// Notifications
import Notifications from 'vue-notification';
Vue.use(Notifications);

// Register component
Vue.component('leaflet-map', require('./components/LeafletMap.vue').default);
Vue.component('object-create-form', require('./components/Objects/CreateForm.vue').default);
Vue.component('object-edit-form', require('./components/Objects/EditForm.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);
Vue.component('delete-btn', require('./components/DeleteButton.vue').default);

const app = new Vue({
    el: '#app',
});


