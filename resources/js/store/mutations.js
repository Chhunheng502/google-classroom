let mutations = {
    FETCH_CLASSWORKS(state, classworks) {
        return state.classworks = classworks
    },
    CREATE_CLASSWORK(state, classwork) {
        if (classwork.topic_id != null) {
            let index = state.classworks.topics.findIndex(item => item.id === classwork.topic_id)
            state.classworks.topics[index].contents.push(classwork)
        } else {
            state.classworks.noTopic.listItems.push(classwork)
        }
    },
    SHOW_CLASSWORK(state, classwork) {
        return state.classwork = classwork
    },
    UPDATE_CLASSWORK(state, classwork) {
        if (classwork.topic_id != null) {
            let topic_index = state.classworks.topics.findIndex(item => item.id === classwork.topic_id)
            let classwork_index = state.classworks.topics[topic_index].contents.findIndex(item => (item.id === classwork.id && item.type === classwork.type))

            if (classwork_index < 0) {
                state.classworks.topics[topic_index].contents.push(classwork);
            } else  {
                state.classworks.topics[topic_index].contents[classwork_index] = classwork;
            }
        } else {
            let index = state.classworks.noTopic.listItems.findIndex(item => (item.id === classwork.id && item.type === classwork.type))

            if (index < 0) {
                state.classworks.noTopic.listItems.push(classwork)
            } else {
                state.classworks.noTopic.listItems[index] = classwork
            }
        }
    },
    DELETE_CLASSWORK(state, classwork) {
        if (classwork.topic_id != null) {
            let topic_index = state.classworks.topics.findIndex(item => item.id === classwork.topic_id)
            let classwork_index = state.classworks.topics[topic_index].contents.findIndex(item => (item.id === classwork.id && classwork.type.includes(item.type)))
            state.classworks.topics[topic_index].contents.splice(classwork_index, 1)
        } else {
            let index = state.classworks.noTopic.listItems.findIndex(item => (item.id === classwork.id && classwork.type.includes(item.type)))
            state.classworks.noTopic.listItems.splice(index, 1)
        }
    },
    
    FETCH_TOPICS(state, topics) {
        return state.topics = topics
    },
    CREATE_TOPIC(state, topic) {
        state.classworks.topics.push(topic)
        state.topics.push(topic)
    },

    DELETE_Material(state, material) {
        let index = state.materials.findIndex(item => item.id === material.id)
        state.materials.splice(index, 1)
    },
}

export default mutations