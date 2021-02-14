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

console.log(
    `%c ${admin.name} %c v${admin.version} %c`,
    'background:#0099e5 ; padding: 1px; border-radius: 3px 0 0 3px;  color: #fff',
    'background:#34bf49 ; padding: 1px; border-radius: 0 3px 3px 0;  color: #fff',
    'background:transparent'
)