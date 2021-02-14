import {createApp} from 'vue'

import ElementPlus from 'element-plus'

import admin from './admin'

window.admin = admin

import state from './mixins/state'

import http from './http'

window.createVueApp = (element, App) => {
    const app = createApp(App)

    app.mixin(state)
    app.use(ElementPlus)
    app.mount(element)

    app.config.globalProperties.$http = http

    return app
}
