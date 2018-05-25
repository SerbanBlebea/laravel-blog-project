
require('./bootstrap');

// Import Vue js
window.Vue = require('vue');

import { VueEditor } from 'vue2-editor';


// Init Vue js components
Vue.component('vue-editor', VueEditor);
Vue.component('vue-editor-wrapper', require('./components/VueEditorWrapper.vue'));
Vue.component('vue-chart', require('./components/Chart.vue'));
Vue.component('textarea-counter', require('./components/TextareaCounter.vue'));

Vue.component('image-modal', require('./components/ImageUpload/ImageModal.vue'));
Vue.component('image-upload', require('./components/ImageUpload/ImageUpload.vue'));
Vue.component('image-card', require('./components/ImageUpload/ImageCard.vue'));

// Setup global variables
Vue.prototype.api = '/api/v1/';

const app = new Vue({
    el: '#app'
});
