let actions = {
    fetchMaterials({commit}, classroom) {
        axios.get(`/api/cl/${classroom.id}/materials`)
            .then(res => {
                commit('FETCH_MATERIALS', res.data.data) // FIXME [is there a better way to naming response data format?]
                this.state.isLoading = false;
            }).catch(err => {
            console.log(err)
        })
    },
    createMaterial({commit}, classroom, material) {
        axios.post(`/api/cl/${classroom.id}/materials`, material)
            .then(res => {
                commit('CREATE_MATERIAL', res.data)
            }).catch(err => {
            console.log(err)
        })
      
    },
    deleteMaterial({commit}, classroom, material) {
        axios.delete(`/api/cl/${classroom.id}/materials/${material.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_MATERIAL', material)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions