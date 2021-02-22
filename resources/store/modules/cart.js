export default {
    actions: {
        getCartItems(ctx) {
            ctx.commit('updateCartItems')
        },
        getCartTotal(ctx) {
            var cartItems = this.state.cart.cartItems;
            var total = 0;
            if (cartItems.length > 0) {
                for (let i = 0; i < cartItems.length; i += 1) {
                    total += cartItems[i].price * cartItems[i].count
                }
            }
            ctx.commit('updateCartTotal', total)
        },
        deleteCartItems(ctx) {
            ctx.commit('clearCart')
        },
        deleteCartItem(ctx, cartItemId) {
            ctx.commit('removeCartItem', cartItemId)
        }
    },
    mutations: {
        updateCartItems(state, cartItems) {
            state.cartItems = cartItems
        },
        addToCart(state, newCartItem) {
            state.cartItems.unshift(newCartItem)
        },
        removeCartItem(state, cartItemId) {
            state.cartItems.splice(cartItemId, 1)
        },
        updateCartTotal(state, total) {
            state.cartTotal = total
        },
        updateCartItemCount(state, id) {
            state.cartItems[id].count
        },
        clearCart(state) {
            state.cartItems = []
        }
    },
    state: {
        cartItems: [],
        cartTotal: 0
    },
    getters: {
        cartItems(state) {
            return state.cartItems
        },
        cartItemsCount(state, getters) {
            return getters.cartItems.reduce((prev,next) => prev + next.count,0);
        },
        cartTotal(state) {
            return state.cartTotal
        },
    }
}
