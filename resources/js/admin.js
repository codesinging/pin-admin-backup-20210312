import {reactive} from 'vue'

const state = reactive({})

const set = (key, value) => {
    state[key] = value
}

const get = (key, def) => {
    return state[key] === undefined ? def : state[key]
}

const setTrue = key => {
    state[key] = true
}

const setFalse = key => {
    state[key] = false
}

const toggle = key => {
    state[key] = !state[key]
}

export default {
    name: 'PinAdmin',
    version: adminVersion,
    state,
    setTrue,
    setFalse,
    toggle,
    set,
    get,
}
