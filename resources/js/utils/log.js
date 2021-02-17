const bgColors = {
    main: '#409EFF',
    success: '#67C23A',
    warning: '#E6A23C',
    danger: '#F56C6C',
    info: '#909399',
}

const log = (message, type = 'info') => {
    console.log(
        `%c ${admin.name} %c ${message} %c`,
        `background:${bgColors.main} ; padding: 1px; border-radius: 3px 0 0 3px;  color: #fff`,
        `background:${bgColors[type]} ; padding: 1px; border-radius: 0 3px 3px 0;  color: #fff`,
        'background:transparent'
    )
}

export default {
    success: (message) => {
        log(message, 'success')
    },
    warning: (message) => {
        log(message, 'warning')
    },
    error: (message) => {
        log(message, 'danger')
    },
    info: (message) => {
        log(message, 'info')
    },
}