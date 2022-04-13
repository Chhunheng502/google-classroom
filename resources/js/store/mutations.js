let mutations = {
    FETCH_MATERIALS(state, materials) {
        return state.materials = materials
    },
    CREATE_MATERIAL(state, material) {
        state.materials.unshift(material)
    },
    DELETE_MATERIAL(state, material) {
        let index = state.materials.findIndex(item => item.id === material.id)
        state.materials.splice(index, 1)
    }
}

export default mutations