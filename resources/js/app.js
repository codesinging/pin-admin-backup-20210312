import {createApp} from 'vue'

window.ElementPlus = require('element-plus')

import admin from './admin'

window.admin = admin

import state from './mixins/state'

window.createVueApp = (element, App) => {
    return createApp(App)
        .mixin(state)
        .use(ElementPlus)
        .mount(element)
}
