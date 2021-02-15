import {createApp} from 'vue'

import ElementPlus, {ElMessage} from 'element-plus'

import state from './state'

import mixin from './mixin'

import http from './http'

window.admin = {
    name: 'PinAdmin',
    version: adminVersion,
    ...state,
    message: ElMessage,
    createApp: (element, App) => {
        const app = createApp(App)

        app.mixin(mixin)
        app.use(ElementPlus)
        app.mount(element)

        app.config.globalProperties.$http = http

        return app
    }
}

console.log(
    `%c ${admin.name} %c v${admin.version} %c`,
    'background:#0099e5 ; padding: 1px; border-radius: 3px 0 0 3px;  color: #fff',
    'background:#34bf49 ; padding: 1px; border-radius: 0 3px 3px 0;  color: #fff',
    'background:transparent'
)