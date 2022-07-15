class PropertiesService {
    getAll() {
        return axios.get('/api/properties');
    }
}

export default new PropertiesService;
