import axios from "axios";

const tasks = {
    create(payload){
        const url = `${process.env.VUE_APP_API_URL}/tasks`
        
        return axios.post(url, payload)
            .then(response => response.data)
    },
    delete(id) {
        const url = `${process.env.VUE_APP_API_URL}/tasks/${id}`
        
        return axios.delete(url)
            .then(response => response.data)
    },
    index() {
        const url = `${process.env.VUE_APP_API_URL}/tasks`

        return axios.get(url)
            .then(response => response.data)
    },
    update(data) {
        const url = `${process.env.VUE_APP_API_URL}/tasks/${data.id}`
        
        return axios.put(url, data)
            .then(response => response.data)
    }
}

export default tasks