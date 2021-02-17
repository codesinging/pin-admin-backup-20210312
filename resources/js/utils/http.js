import axios from "axios"
import log from "./log"

const errors = (type, error) => {
    log.error(type)

    Object.keys(error).forEach(key => {
        if (typeof error[key] !== 'function') {
            console.log(`[${key}]`, error[key])
        }
    })
}

axios.defaults.baseURL = baseUrl
axios.defaults.withCredentials = true
axios.defaults.timeout = 10 * 1000
axios.defaults.headers['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers['X-CSRF-TOKEN'] = csrfToken

axios.interceptors.request.use(config => {
    if (config.label) {
        admin.setTrue(config.label)
    }

    if (typeof config.message === 'undefined') {
        config.message = true
    }

    return config
}, error => {
    admin.message.error('发送网络请求错误')

    errors('request.error', error)

    return Promise.reject(error)
})

axios.interceptors.response.use(response => {
    if (response.config.label) {
        admin.setFalse(response.config.label)
    }

    if (response.status === 200) {
        if (response.data.code === 0) {
            if (response.config.message) {
                admin.message.success(response.data.message || '网络请求成功')
            }
            return response.data
        } else {
            if (response.config.message) {
                admin.message.error(response.data.message || '响应数据错误')
            }

            errors('response.data.error', response)

            return Promise.reject(response.data.message)
        }
    } else {
        if (response.config.message) {
            admin.message.error(response.data.message || '请求响应错误')
        }

        errors('response.status.error', response)

    }
    return Promise.reject(response.data.message)
}, error => {
    if (error.config.label) {
        admin.setFalse(error.config.label)
    }

    if (error.config.message) {
        let message = ''
        if (error.response && error.response.data && error.response.data.errors){
            message = Object.values(error.response.data.errors)[0][0]
        }
        admin.message.error(message || error.response.statusText || '网络请求错误')
    }

    errors('response.error', error)


    return Promise.reject(error)
})

export default axios
