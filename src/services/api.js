import axios from 'axios'

export default () => {
    const instance = axios.create({
        baseURL: 'http://localhost:3000'
    })

    instance.interceptors.request.use((config) => {
        const token = localStorage.getItem('token')
        if (token) {
            config.headers.Authorization = `Bearer ${token}`
        }
        return config
    })

    return instance
}