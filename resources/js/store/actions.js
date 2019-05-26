const actions = {
    async ADD_COMMENT({ commit }, comment) {
        const response = axios.post('/comments', comment);

        return response;
    },
    async GET_COMMENTS({ commit }) {
        try {
            const response = await axios.get('/comments');

            commit('GET_COMMENTS', response.data);
        } catch (error) {
            console.log(error);
        }
    }
};

export default actions;
