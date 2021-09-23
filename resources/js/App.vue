<template>
  <div>
    <div v-if="$route.meta.loginLayout || $route.meta.Error404">
        <router-view></router-view>
    </div>
    <div class="main-wrapper" v-else>
      <navbar></navbar>
      <sidebar></sidebar>
      <div class="main-content">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/layouts/Navbar.vue";
import Sidebar from "./components/layouts/Sidebar.vue";
export default {
  components: {
    Navbar,
    Sidebar,
  },
};
</script>
