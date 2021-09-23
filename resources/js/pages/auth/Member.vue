<template>
  <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div
        class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white"
      >
        <div class="p-4 m-3">
          <div class="row mb-5">
            <div class="col-12 text-center">
             <h1>SOCIAL MEDIA MANAGEMENT</h1>
              <div class="d-flex justify-content-center mt-4">
                <button
                  class="btn"
                  v-bind:class="{'btn-danger': login}"
                  v-on:click="login = !login"
                >
                  Login
                </button>
                <button class="btn"  v-bind:class="{'btn-danger': !login}" v-on:click="login = !login">
                  Register
                </button>
              </div>
            </div>
          </div>
          <div v-if="login">
            <form
              method="POST"
              action="#"
              class="needs-validation"
              novalidate=""
            >
              <div class="form-group">
                <label for="email">Username</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  tabindex="1"
                  required
                  autofocus
                />
                <div class="invalid-feedback">Username harus diisi!</div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  tabindex="2"
                  required
                />
                <div class="invalid-feedback">Password harus diisi!</div>
              </div>

              <div class="form-group text-left">
                <button
                  type="submit"
                  class="btn btn-primary btn-lg btn-icon icon-right"
                  tabindex="4"
                >
                  Login
                </button>
              </div>
               <div class="mt-5 text-center">
                Login sebagai <router-link to="/auth/admin">Admin</router-link>
                </div>
            </form>
          </div>
          <div v-else>
           <form
              method="POST"
              action="#"
              class="needs-validation"
              novalidate=""
            >
              <div class="form-group">
                <label for="email">Username</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  tabindex="1"
                  required
                  autofocus
                />
                <div class="invalid-feedback">Username harus diisi!</div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  tabindex="2"
                  required
                />
                <div class="invalid-feedback">Password harus diisi!</div>
              </div>
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Konfirmasi Password</label>
                </div>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  tabindex="2"
                  required
                />
                <div class="invalid-feedback">Password harus diisi!</div>
              </div>

              <div class="form-group text-left">
                <button
                  type="submit"
                  class="btn btn-primary btn-lg btn-icon icon-right"
                  tabindex="4"
                >
                  Register
                </button>
              </div>
            </form>
          </div>

          <div class="text-center mt-5 text-small">
            Copyright &copy; Social Media Management. Made with 💙 by Stisla
          </div>
        </div>
      </div>
      <div
        class="
          col-lg-8 col-12
          order-lg-2 order-1
          min-vh-100
          background-walk-y
          position-relative
          overlay-gradient-bottom
        "
        data-background="/assets/img/login-bg.jpg"
      >
        <div class="absolute-bottom-left index-2">
          <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
              <h1 class="mb-2 display-4 font-weight-bold">
                Welcome to <br />
                Social Media Management
              </h1>
              <h5 class="font-weight-normal text-muted-transparent">
                Sukses Bisnis Online
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      login: true,
    };
  },
};
</script>
