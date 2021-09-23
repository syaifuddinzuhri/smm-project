<template>
  <div>
    <div class="main-sidebar">
      <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <a href="index.html">Social Media Management</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html">SMM</a>
        </div>
        <ul class="sidebar-menu">
          <li class="menu-header">Adminstrator</li>
          <router-link
            to="/"
            v-slot="{ href, navigate, isActive, isExactActive }"
            custom
            exact
          >
            <li
              :class="[
                isActive && 'active',
                isExactActive && 'exact-active',
              ]"
            >
              <a :href="href" class="nav-link" @click="navigate"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
          </router-link>
          <router-link
            to="/member"
            v-slot="{ href, navigate, isActive, isExactActive }"
            custom
          >
            <li
              :class="[
                isActive && 'active',
                isExactActive && 'exact-active',
              ]"
            >
              <a :href="href" class="nav-link" @click="navigate"><i class="far fa-user"></i> <span>Data Member</span></a>
            </li>
          </router-link>
          <router-link
            to="/produk"
            v-slot="{ href, navigate, isActive, isExactActive }"
            custom
          >
            <li
              :class="[
                isActive && 'active',
                isExactActive && 'exact-active',
              ]"
            >
              <a :href="href" class="nav-link" @click="navigate"><i class="fas fa-poll"></i> <span>Data Produk</span></a>
            </li>
          </router-link>
          <router-link
            to="/riwayat-transaksi"
            v-slot="{ href, navigate, isActive, isExactActive }"
            custom
          >
            <li
              :class="[
                isActive && 'active',
                isExactActive && 'exact-active',
              ]"
            >
              <a :href="href" class="nav-link" @click="navigate"><i class="far fa-file-alt"></i> <span>Riwayat Transaksi</span></a>
            </li>
          </router-link>
        </ul>
      </aside>
    </div>
  </div>
</template>

<script>
export default {};
</script>
