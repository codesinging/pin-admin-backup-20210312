import {createApp} from 'vue'

import ElementPlus, {ElMessage} from 'element-plus'

import state from './utils/state'

import mixin from './utils/mixin'

import http from './utils/http'

import log from "./utils/log";

window.admin = {
    name: 'PinAdmin',
    version: adminVersion,
    ...state,
    message: ElMessage,
    log,
    createApp: (element, App) => {
        const app = createApp(App)

        app.mixin(mixin)
        app.use(ElementPlus)
        app.mount(element)

        app.config.globalProperties.$http = http

        return app
    }
}

log.info(`version: ${admin.version}`)
