let actions = {
    fetchClassworks({commit}, classroom) {
        axios.get(`/api/cl/${classroom.id}/all`)
            .then(res => {
                commit('FETCH_CLASSWORKS', res.data.data) // FIXME [is there a better way to naming response data format?]
                this.state.isLoading = false; // FIXME [find a way to manage this better]
            }).catch(err => {
            console.log(err)
        })
    },
    createClasswork({commit}, request) {
        axios.post(`/api/cl/${request.classroom.id}/${request.classwork.type}`, request.form)
            .then(res => {
                commit('CREATE_CLASSWORK', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
    showClasswork({commit}, request) {
        axios.get(`/api/cl/${request.classroom.id}/${request.classwork.type}/${request.classwork.id}`)
            .then(res => {
                commit('SHOW_CLASSWORK', res.data.data)
                this.state.isLoading = false;
            }).catch(err => {
            console.log(err)
        })
    },
    updateClasswork({commit}, request) {
        axios.put(`/api/cl/${request.classroom.id}/${request.classwork.type}/${request.classwork.id}`, request.form)
            .then(res => {
                commit('UPDATE_CLASSWORK', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteClasswork({commit}, request) {
        axios.delete(`/api/cl/${request.classroom.id}/${request.classwork.type}/${request.classwork.id}`)
            .then(res => {
                commit('DELETE_CLASSWORK', request.classwork)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchTopics({commit}, classroom) {
        axios.get(`/api/cl/${classroom.id}/topics`)
            .then(res => {
                commit('FETCH_TOPICS', res.data.data)
            }).catch(err => {
            console.log(err);
        })
    },
    createTopic({commit}, request) {
        axios.post(`/api/cl/${request.classroom.id}/topics`, request.form)
            .then(res => {
                commit('CREATE_TOPIC', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
}

export default actions