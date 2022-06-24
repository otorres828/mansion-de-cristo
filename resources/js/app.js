require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var Turbolinks = require("turbolinks")
Turbolinks.start()

import * as serviceWorkerRegistration from './serviceWorkerRegistration';
serviceWorkerRegistration.register();