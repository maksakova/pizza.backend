export default {
    actions: {
        getCurrentItemId(ctx, id = 1) {
            ctx.commit('updateCurrentItemId', id)
        }
    },
    mutations: {
        updateCurrentItemId(state, currentItemId) {
            state.currentItemId = currentItemId
        },
        setCurrentItemId(state, id) {
            state.currentItemId = id
        }
    },
    state: {
        currentItemId: 0,
    },
    getters: {
        currentItem(state) {
            return state.currentItemId
        },
    }
}