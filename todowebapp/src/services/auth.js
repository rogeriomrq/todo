import axios from "axios";

const auth = {
    login(data) {
        const url = `${process.env.VUE_APP_API_URL}/login`

        return axios.post(url, data)
            .then(response => response.data)
    },
    logout() {
        const url = `${process.env.VUE_APP_API_URL}/logout`

        return axios.post(url)
            .then(response => response.data)
    }
}

export default auth