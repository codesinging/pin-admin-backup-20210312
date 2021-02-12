module.exports = {
    data() {
        return {
            state: admin.state,
        }
    },

    methods: {
        $true(key) {
            this.state[key] = true
        },

        $false(key) {
            this.state[key] = false
        },

        $toggle(key) {
            this.state[key] = !this.state[key]
        },

        $set(key, value) {
            this.state[key] = value
        },

        $get(key, def) {
            return this.state[key] === undefined ? def : this.state[key]
        }
    }
}