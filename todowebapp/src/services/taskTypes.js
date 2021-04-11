import axios from "axios";

const taskTypes = {
    index() {
        const url = `${process.env.VUE_APP_API_URL}/taskTypes`

        return axios.get(url)
            .then(response => response.data)
    }
}

export default taskTypes