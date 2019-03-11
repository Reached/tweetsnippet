import CreateSnippet from './components/CreateSnippet.vue';
import Snippet from './components/Snippet.vue';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import {LuminousGallery} from 'luminous-lightbox';

new LuminousGallery(document.querySelectorAll('.lightbox-item'), {}, {
    caption: function(element) {
        return element.dataset.caption;
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('create-snippet', CreateSnippet);
// Vue.component('snippet', Snippet);
//
// const app = new Vue({
//     el: '#app'
// });
