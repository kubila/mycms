export const namespaced = true;

let nextId = 1;

export const state = {
  notifications: []
};

export const actions = {
  add({ commit }, notification) {
    commit('PUSH', notification);
  },
  delete({ commit }, notificationToRemove) {
    commit('DELETE', notificationToRemove);
  }
};

export const mutations = {
  PUSH(state, notification) {
    state.notifications.push({
      ...notification,
      id: nextId++
    });
  },
  DELETE(state, notificationToRemove) {
    state.notifications = state.notifications.filter(notification => {
      notification.id !== notificationToRemove.id;
    });
  }
};
